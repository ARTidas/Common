<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class KnowledgeCenterDatabaseViewView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <h1>Databases</h1>

                <h2>MariaDB (Open source MySQL)</h2>

                <ol>
                    <li>Host: pti.unithe.hu</li>
                    <li>Port: 13306</li>
                </ol>
                <ol>
                    <li>Host: localhost</li>
                    <li>Port: 3306</li>
                </ol>

                <h2>Queries</h2>

                <ol>
                    <li>CREATE SCHEMA `trisz` DEFAULT CHARACTER SET utf8 ;</li>
                    <li>CREATE USER 'trisz'@'%' IDENTIFIED BY 'asdf';</li>
                    <li>SET PASSWORD FOR trisz = PASSWORD("asdf");</li>
                    <li>GRANT ALL PRIVILEGES ON trisz.* TO 'trisz';</li>
                    <li>GRANT ALL PRIVILEGES ON trisz.* TO 'trisz' WITH GRANT OPTION;</li>
                </ol>
				
			<?php
		}

    }

?>