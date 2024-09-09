<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class UserDao extends AbstractDao {

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function create(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				INSERT INTO
					common.users
				SET
                    email                   = ?,
					is_active 				= 1,
					created_at				= NOW(),
					updated_at 				= NOW()
			";

			try {
				$database_connection = ($this->database_connection_bo)->getConnection();

				$database_connection
					->prepare($query_string)
					->execute(
						(
							array_map(
								function($value) {
									return $value === '' ? NULL : $value;
								},
								$parameters
							)
						)
					)
				;

				return(
					$database_connection->lastInsertId()
				);
			}
			catch(Exception $exception) {
				LogHelper::addError('ERROR: ' . $exception->getMessage());

				return false;
			}
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function createPassword(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				INSERT INTO
					common.user_passwords
				SET
                    user_id                 = ?,
					hash					= ?,
					salt					= ?,
					is_active 				= 1,
					created_at				= NOW(),
					updated_at 				= NOW()
			";

			try {
				$database_connection = ($this->database_connection_bo)->getConnection();

				$database_connection
					->prepare($query_string)
					->execute(
						(
							array_map(
								function($value) {
									return $value === '' ? NULL : $value;
								},
								$parameters
							)
						)
					)
				;

				return(
					$database_connection->lastInsertId()
				);
			}
			catch(Exception $exception) {
				LogHelper::addError('ERROR: ' . $exception->getMessage());

				return false;
			}
		}

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function createLogin(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				INSERT INTO
					common.user_logins
				SET
                    user_id                 = ?,
					session_id				= ?,
                    request_details         = ?,
					is_active 				= 1,
					created_at				= NOW(),
					updated_at 				= NOW()
			";

			try {
				$database_connection = ($this->database_connection_bo)->getConnection();

				$database_connection
					->prepare($query_string)
					->execute(
						(
							array_map(
								function($value) {
									return $value === '' ? NULL : $value;
								},
								$parameters
							)
						)
					)
				;

				return(
					$database_connection->lastInsertId()
				);
			}
			catch(Exception $exception) {
				LogHelper::addError('ERROR: ' . $exception->getMessage());

				return false;
			}
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function deleteLogin(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				UPDATE
					common.user_logins
				SET
					is_active 				= 0,
					updated_at 				= NOW()
				WHERE
					user_id 				= ? AND
					session_id 				= ?
			";

			try {
				$database_connection = ($this->database_connection_bo)->getConnection();

				$database_connection
					->prepare($query_string)
					->execute(
						(
							array_map(
								function($value) {
									return $value === '' ? NULL : $value;
								},
								$parameters
							)
						)
					)
				;

				return(
					$database_connection->lastInsertId()
				);
			}
			catch(Exception $exception) {
				LogHelper::addError('ERROR: ' . $exception->getMessage());

				return false;
			}
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function getList() {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				SELECT
					USERS.id 					AS id,
					USERS.email 				AS email,
					USERS.is_active 			AS is_active,
					USERS.created_at 			AS created_at,
					USERS.updated_at 			AS updated_at,
					USER_PROFILES.name 			AS name,
					USER_PROFILES.neptun_code   AS neptun_code,
					USER_PROFILES.phone 		AS phone,
					LEFT(USER_PROFILES.birthday_at, 10)	AS birthday_at
				FROM
					common.users USERS
					LEFT JOIN common.user_profiles USER_PROFILES
						ON USERS.id = USER_PROFILES.user_id AND
						USER_PROFILES.is_active = 1
				WHERE
					USERS.is_active = 1
				ORDER BY
					USER_PROFILES.name ASC,
					USERS.email ASC
			;";

			try {
				$handler = ($this->database_connection_bo)->getConnection();
				$statement = $handler->prepare($query_string);
				$statement->execute();
				
				return $statement->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(Exception $exception) {
				LogHelper::addError('Error: ' . $exception->getMessage());

				return false;
			}
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function get(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				SELECT
					USERS.id 					AS id,
					USERS.email 				AS email,
					USERS.is_active 			AS is_active,
					USERS.created_at 			AS created_at,
					USERS.updated_at 			AS updated_at,
					USER_PROFILES.name 			AS name,
					USER_PROFILES.neptun_code 	AS neptun_code,
					USER_PROFILES.phone 		AS phone,
					USER_PROFILES.birthday_at 	AS birthday_at
				FROM
					common.users USERS
					LEFT JOIN common.user_profiles USER_PROFILES
						ON USERS.id = USER_PROFILES.user_id  AND
		   				   USER_PROFILES.is_active = 1
				WHERE
					USERS.id = ?
				;
			";

			try {
				$handler = ($this->database_connection_bo)->getConnection();
				$statement = $handler->prepare($query_string);
				$statement->execute(
					array_map(
						function($value) {
							return $value === '' ? NULL : $value;
						},
						$parameters
					)
				);
				
				return $statement->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(Exception $exception) {
				LogHelper::addError('Error: ' . $exception->getMessage());

				return false;
			}
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function getByEmail(array $parameters) {
			//TODO: Abstract the parameter name... 
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				SELECT
					USERS.id 		        AS id,
                    USERS.email       		AS email,
					USER_PASSWORDS.salt		AS password_salt,
					USER_PASSWORDS.hash		AS password_hash,
                    USERS.is_active 	    AS is_active,
                    USERS.created_at        AS created_at,
                    USERS.updated_at        AS updated_at,
					USER_PROFILES.name		AS name
				FROM
					common.users USERS
					INNER JOIN common.user_passwords USER_PASSWORDS
						ON USERS.id = USER_PASSWORDS.user_id
					LEFT JOIN common.user_profiles USER_PROFILES
						ON USERS.id = USER_PROFILES.user_id  AND
		   				   USER_PROFILES.is_active = 1
				WHERE
					USERS.email = ?
				LIMIT 1
			";

			try {
				$handler = ($this->database_connection_bo)->getConnection();
				$statement = $handler->prepare($query_string);
				$statement->execute(
					array_map(
						function($value) {
							return $value === '' ? NULL : $value;
						},
						$parameters
					)
				);
				
				return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
			}
			catch(Exception $exception) {
				LogHelper::addError('Error: ' . $exception->getMessage());

				return false;
			}
		}

		
		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function deActivateProfiles(AbstractDo $do) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				UPDATE
					common.user_profiles USER_PROFILES
				SET
					USER_PROFILES.is_active		= 0,
					USER_PROFILES.updated_at 	= NOW()
				WHERE
					USER_PROFILES.user_id 		= :user_id AND
					USER_PROFILES.is_active		= 1
			";

			try {
                $handler = $this->database_connection_bo->getConnection();
                $statement = $handler->prepare($query_string);
                $statement->bindValue(':user_id', $do->id, PDO::PARAM_INT);
                $statement->execute();
        
                return true;
            } catch (Exception $exception) {
                LogHelper::addError('Error: ' . $exception->getMessage());
        
                return false;
            }
		}


		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function createProfile(AbstractDo $do) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				INSERT INTO
					common.user_profiles
				SET
					user_id 		= :user_id,
                    name            = :name,
					neptun_code 	= :neptun_code,
					phone			= :phone,
					birthday_at		= :birthday_at,
					is_active		= 1,
					created_at 		= NOW(),
					updated_at 		= NOW()
			";

			try {
                $handler = $this->database_connection_bo->getConnection();
                $statement = $handler->prepare($query_string);
                $statement->bindValue(':user_id', $do->id, PDO::PARAM_INT);
				$statement->bindValue(':name', $do->name, PDO::PARAM_STR);
				$statement->bindValue(':neptun_code', $do->neptun_code, PDO::PARAM_STR);
				$statement->bindValue(':phone', $do->phone, PDO::PARAM_STR);
				$statement->bindValue(':birthday_at', $do->birthday_at, PDO::PARAM_STR);
                $statement->execute();
        
                return $handler->lastInsertId();
            } catch (Exception $exception) {
                LogHelper::addError('Error: ' . $exception->getMessage());
        
                return false;
            }
		}

		
	}
?>
