<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class UserPermissionDao extends AbstractDao {

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function create(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				INSERT INTO
					common.users_permissions
				SET
                    user_id                 = ?,
                    permission_id           = ?,
                    status                  = 'REQUESTED',
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
                    USERS_PERMISSIONS.id 			AS id,
                    USERS_PERMISSIONS.user_id 		AS user_id,
                    USER_PROFILES.name				AS user_name,
                    USERS_PERMISSIONS.permission_id AS permission_id,
                    PERMISSIONS.name				AS permission_name,
                    USERS_PERMISSIONS.status 		AS status,
                    USERS_PERMISSIONS.is_active 	AS is_active,
                    USERS_PERMISSIONS.created_at 	AS created_at,
                    USERS_PERMISSIONS.updated_at 	AS updated_at
                FROM
                    common.users_permissions USERS_PERMISSIONS
                    INNER JOIN common.users AS USERS
                        ON USERS_PERMISSIONS.user_id = USERS.id
                    LEFT JOIN common.user_profiles USER_PROFILES
                        ON USER_PROFILES.user_id = USERS.id AND
                        USER_PROFILES.is_active = 1
                    INNER JOIN common.permissions AS PERMISSIONS
                        ON USERS_PERMISSIONS.permission_id = PERMISSIONS.id
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
		public function getListForReview() {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				SELECT
                    USERS_PERMISSIONS.id 			AS id,
                    USERS_PERMISSIONS.user_id 		AS user_id,
                    USER_PROFILES.name				AS user_name,
                    USERS_PERMISSIONS.permission_id AS permission_id,
                    PERMISSIONS.name				AS permission_name,
                    USERS_PERMISSIONS.status 		AS status,
                    USERS_PERMISSIONS.is_active 	AS is_active,
                    USERS_PERMISSIONS.created_at 	AS created_at,
                    USERS_PERMISSIONS.updated_at 	AS updated_at
                FROM
                    common.users_permissions USERS_PERMISSIONS
                    INNER JOIN common.users AS USERS
                        ON USERS_PERMISSIONS.user_id = USERS.id
                    LEFT JOIN common.user_profiles USER_PROFILES
                        ON USER_PROFILES.user_id = USERS.id AND
                        USER_PROFILES.is_active = 1
                    INNER JOIN common.permissions AS PERMISSIONS
                        ON USERS_PERMISSIONS.permission_id = PERMISSIONS.id
				WHERE
					USERS_PERMISSIONS.status = 'REQUESTED'
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
		public function update(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				UPDATE
					common.users_permissions
				SET
					status 					= ?,
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
