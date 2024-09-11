<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class KnowledgeCenterLinuxCommandsViewView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <h1>Linux commands</h1>

                <ol>
                    <li>Install a program
                        <ul>
                            <li>apt install &lt;program_name&gt;</li>
                            <li>apt install telnet</li>
                            <li>apt install fortune</li>
                            <li>apt install cowsay</li>
                            <li>apt install toilet</li>
                            <li>apt install cmatrix</li>
                            <li>apt install rig</li>
                            <li>apt install aview</li>
                        </ul>
                    </li>
                </ol>

                <h2>Fun</h2>

                <ol>
                    <li>sl</li>
                    <li>2048</li>
                    <li>fortune</li>
                    <li>cowsay I Love PTI</li>
                    <li>fortune | cowsay </li>
                    <li>toilet PTI is Love</li>
                    <li>cmatrix</li>
                    <li>rig</li>
                </ol>
				
			<?php
		}

    }

?>