<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class KnowledgeCenterRoboticsViewView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <h1>Developing a robotics project</h1>

                <h2>Prepare the IDE</h2>

                <ol>
                    <li>
                        <a href="https://docs.arduino.cc/software/ide-v2/tutorials/getting-started/ide-v2-downloading-and-installing/">
                            Follow these instructions...
                        </a>
                    </li>
                </ol>

                <h2>Useful linux commands</h2>

                <ol>
                    <li>sudo adduser $USER dialout</li>
                    <li>sudo apt install python3-serial</li>
                </ol>
				
			<?php
		}

    }

?>