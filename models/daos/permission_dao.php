<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class PermissionDao extends AbstractDao {

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function create(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				INSERT INTO
					common.permissions
				SET
                    name                    = ?,
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
		public function getList() {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				SELECT
					PERMISSIONS.id AS id,
					PERMISSIONS.name AS name,
					PERMISSIONS.is_active AS is_active,
					PERMISSIONS.created_at AS created_at,
					PERMISSIONS.updated_at AS updated_at,
					GROUP_CONCAT(
						CONCAT_WS(
							' - ',
							USERS.id,
							USER_PROFILES.name -- IFNULL(USER_PROFILES.name, 'Anon')
						)
						ORDER BY USER_PROFILES.name ASC
						SEPARATOR ', '
					) AS user_list
				FROM
					common.permissions PERMISSIONS
				LEFT JOIN common.users_permissions USERS_PERMISSIONS
					ON PERMISSIONS.id = USERS_PERMISSIONS.permission_id AND
					USERS_PERMISSIONS.is_active = 1 AND
					USERS_PERMISSIONS.status = 'APPROVED'
				LEFT JOIN common.users USERS
					ON USERS.id = USERS_PERMISSIONS.user_id
				LEFT JOIN common.user_profiles USER_PROFILES
					ON USER_PROFILES.user_id = USERS.id AND
					USER_PROFILES.is_active = 1
				WHERE
					PERMISSIONS.is_active = 1
				GROUP BY
					PERMISSIONS.id
				ORDER BY
					PERMISSIONS.name ASC
				;
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
		public function getByUserId($user_id) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				SELECT
					USERS_PERMISSIONS.permission_id AS id,
					PERMISSIONS.name AS name
				FROM
					common.users_permissions USERS_PERMISSIONS
					INNER JOIN common.permissions PERMISSIONS
						ON USERS_PERMISSIONS.permission_id = PERMISSIONS.id
				WHERE
					USERS_PERMISSIONS.is_active = 1 AND
					USERS_PERMISSIONS.status = 'APPROVED' AND
					USERS_PERMISSIONS.user_id = :user_id
				;
			";

			try {
                $handler = $this->database_connection_bo->getConnection();
                $statement = $handler->prepare($query_string);
                $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                $statement->execute();
        
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $exception) {
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
					PERMISSIONS.id 					AS id,
					PERMISSIONS.name 				AS name,
					PERMISSIONS.is_active 			AS is_active,
					PERMISSIONS.created_at 			AS created_at,
					PERMISSIONS.updated_at 			AS updated_at
				FROM
					common.permissions PERMISSIONS
				WHERE
					PERMISSIONS.id = ?
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
		public function update(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				UPDATE
					common.permissions
				SET
					name 					= ?,
					is_active 				= ?,
					updated_at 				= NOW()
				WHERE
					id 						= ?
			";

			try {
				return(
					($this->database_connection_bo)->getConnection()
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
				);
			}
			catch(Exception $exception) {
				LogHelper::addError('ERROR: ' . $exception->getMessage());

				return false;
			}
		}
		
	}
?>
