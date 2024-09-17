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
                    <li>echo $PYTHONPATH</li>
                    <li>nano /etc/profile.d/pythonpath.sh
                        <ul><li>export PYTHONPATH=$PYTHONPATH:/var/www/html/scripts/common</li></ul>
                    </li>
                    <li>source /etc/profile</li>
                    <li>nano /etc/bash.bashrc</li>
                        <ul><li>export PYTHONPATH=$PYTHONPATH:/var/www/html/scripts/common</li></ul>
                    <li>source /etc/bash.bashrc</li>
                </ol>

                <h2>Use your own module</h2>

                <ol>
                    <li>nano /var/www/html/scripts/test.py</li>
                </ol>
				
			<?php
		}

    }

?>