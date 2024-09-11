<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class KnowledgeCenterUsefulLinkViewView extends ProjectAbstractView {

        public $work_links = [
            'University of Tokaj' => 'https://unithe.hu/',
            'Curriculums' => 'https://www.unithe.hu/intezmenyi-tajekoztato',
            'Neptun' => 'https://neptun.unithe.hu/hallgato/Login.aspx'
        ];
        public $fun_links = [
            'Make it Mame' => 'https://makeitmeme.com/en/',
            'TeleHack' => 'https://telehack.com/'
        ];

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <h1>Useful links</h1>

                <h2>Work</h2>

                <ol>
                    <?php foreach($this->work_links as $title => $link) { ?>
                        <li><a target="_blank" href="<?php print($link); ?>"><?php print($title); ?></a></li>
                    <?php } ?>
                </ol>

                <h2>Fun</h2>

                <ol>
                    <?php foreach($this->fun_links as $title => $link) { ?>
                        <li><a target="_blank" href="<?php print($link); ?>"><?php print($title); ?></a></li>
                    <?php } ?>
                </ol>
				
			<?php
		}

    }

?>