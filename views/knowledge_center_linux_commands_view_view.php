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
                            <li>apt install putty</li>
                            <li>apt install python3-selenium</li>
                            <li>apt install unzip</li>
                            <li>apt install python3-pandas</li>
                        </ul>
                    </li>
                    <li>Enable/Add a new program repository
                        <ul>
                            <li>add-apt-repository &lt;repository_name&gt;</li>
                            <li>add-apt-repository universe</li>
                        </ul>
                    </li>
                    <li>Download and install Debian packages
                        <ul>
                            <li>wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb</li>
                            <li>apt-get install -y ./google-chrome-stable_current_amd64.deb</li>
                            <li>wget https://github.com/SergeyPirogov/webdriver_manager/archive/refs/heads/master.zip -O webdriver_manager.zip
</li>
                            <li>unzip webdriver_manager.zip</li>
                            <li>cd webdriver_manager-master</li>
                            <li>python setup.py install</li>
                        </ul>
                    </li>
                    <li>Download file from server to Linux workstation
                        <ul>
                            <li>
                                scp -P 12201 veresz@pti.unithe.hu:/var/www/html/scripts/page_source.html /home/student/Downloads/files
                            </li>
                            <li>
                                scp -P 12201 /home/student/Downloads/"sajtószoba_táblázat(Munka1).csv" veresz@pti.unithe.hu:/var/www/html/scripts/
                            </li>
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