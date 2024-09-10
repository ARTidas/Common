<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class MapPinDao extends AbstractDao {

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function create(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				INSERT INTO
					common.map_pins
				SET
                    title                   = ?,
					latitude                = ?,
					longitude				= ?,
					popup_html				= ?,
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
					MAP_PINS.id 					AS id,
					MAP_PINS.title 					AS title,
					MAP_PINS.latitude 				AS latitude,
					MAP_PINS.longitude 				AS longitude,
					MAP_PINS.popup_html 			AS popup_html,
					MAP_PINS.is_active 				AS is_active,
					MAP_PINS.created_at 			AS created_at,
					MAP_PINS.updated_at 			AS updated_at
				FROM
					common.map_pins MAP_PINS
				WHERE
					MAP_PINS.is_active = 1
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
		
	}
    
?>
