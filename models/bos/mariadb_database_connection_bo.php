<?php
	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class MariaDBDatabaseConnectionBo {

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		function getConnection() {
			$host          = 'localhost';
            $port          = '3306';
			$database_name = 'queue';
			$user_name     = 'queue_user'; //TODO: Create a secret retrieval process...
			$user_password = 'ZmdWt1P8ra5MH8kvtAFC5S87C45B3FKV55elHx9X8at5bcKlLi'; //TODO: Create a secret retrieval process...

			try {
				$connection = new PDO(
					'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $database_name,
					$user_name,
					$user_password
				);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $exception) {
				throw new Exception('Connection failed: ' . $exception->getMessage());
			}

			return $connection;
		}
        
	}
?>