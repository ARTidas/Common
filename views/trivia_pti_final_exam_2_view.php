<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class TriviaPtiFinalExam2View extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayHTMLOpen() {
			?>
				<!doctype html>
                <html lang="en-US">
                <head>
                    <title><?php print($this->do->title); ?></title>

                    <meta charset="UTF-8" />
                    <meta http-equiv="content-type" content="text/html" />
                    <meta name="description" content="<?php print($this->do->description); ?>" />
                    <meta http-equiv="cache-control" content="max-age=0" />
                    <meta http-equiv="cache-control" content="no-cache" />
                    <meta http-equiv="expires" content="0" />
                    <meta http-equiv="pragma" content="no-cache" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">

                    <link rel="stylesheet" href="<?php print(RequestHelper::$common_url_root); ?>/css/menu.css" type="text/css" />
                    <link rel="stylesheet" href="<?php print(RequestHelper::$common_url_root); ?>/css/form.css" type="text/css" />
                    <link rel="stylesheet" href="<?php print(RequestHelper::$common_url_root); ?>/css/footer.css" type="text/css" />
                    <link rel="stylesheet" href="<?php print(RequestHelper::$common_url_root); ?>/css/map.css" type="text/css" />
                    <link rel="stylesheet" href="<?php print(RequestHelper::$common_url_root); ?>/css/index.css" type="text/css" />

                    <link rel="stylesheet" href="<?php print(RequestHelper::$common_url_root); ?>/css/trivia.css" type="text/css" />

                    <script type="text/javascript" src="<?php print(RequestHelper::$common_url_root); ?>/js/jquery/jquery.js"></script>
                    <script type="text/javascript" src="<?php print(RequestHelper::$common_url_root); ?>/js/nav_menu_dropdown.js"></script>

                    <link rel="stylesheet" href="<?php print(RequestHelper::$common_url_root); ?>/css/leaflet.css" type="text/css" />
                    
                </head>
			<?php
		}

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <!-- Opening Screen -->
                <div id="welcome-screen">
                    <h1>Welcome to Trivia!</h1>
                    <button id="start-button">Start Game</button>
                </div>

                <!-- Trivia Content -->
                <div id="trivia-content">
                    <h2 id="question"></h2>
                    <div id="answers"></div>
                </div>

                <script type="text/javascript">
                    const trivia_json_file_url = 'https://pti.unithe.hu:8443/common/js/json/trivia_pti_2.json'
                </script>
                <script type="text/javascript" src="<?php print(RequestHelper::$common_url_root); ?>/js/trivia.js"></script>
				
			<?php
		}

    }

?>