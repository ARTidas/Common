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
                    MAIN.id 		        AS id,
                    MAIN.email              AS email,
                    MAIN.is_active 	        AS is_active,
                    MAIN.created_at         AS created_at,
                    MAIN.updated_at         AS updated_at
				FROM
					common.users MAIN
				WHERE
					MAIN.is_active = 1
			";

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
					MAIN.id 		        AS id,
                    MAIN.task_type_id       AS task_type_id,
                    MAIN.name               AS name,
                    MAIN.description        AS description,
                    MAIN.last_executed_at   AS last_executed_at,
                    MAIN.script             AS script,
                    MAIN.is_active 	        AS is_active,
                    MAIN.created_at         AS created_at,
                    MAIN.updated_at         AS updated_at
				FROM
					tasks MAIN
				WHERE
					MAIN.id = ?
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
                    USERS.updated_at        AS updated_at
				FROM
					common.users USERS
					INNER JOIN common.user_passwords USER_PASSWORDS
						ON USERS.id = USER_PASSWORDS.user_id
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
		
	}
?>
