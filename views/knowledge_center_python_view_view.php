<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class KnowledgeCenterPythonViewView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <h1>Developing in Python</h1>

                <h2>Create your own modules</h2>

                <ol>
                    <li>mkdir /var/www/html/scripts/common</li>
                    <li>nano /var/www/html/scripts/common/common_datetime_helper.py</li>
                </ol>

                <h2>Import your own modules</h2>

                <ol>
                    <li>export PYTHONPATH=$PYTHONPATH:/var/www/html/scripts/common</li>
                </ol>
				
			<?php
		}

    }

?>