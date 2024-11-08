<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class TriviaViewView extends ProjectAbstractView {

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

                    <link rel="stylesheet" href="<?php print(RequestHelper::$common_url_root); ?>/css/trivia.css" type="text/css" />

                    <script type="text/javascript" src="<?php print(RequestHelper::$common_url_root); ?>/js/jquery/jquery.js"></script>
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
                    <h1>Welcome to the Trivia game!</h1>
                    <button id="start-button">Start Game</button>
                </div>

                <!-- Trivia Content -->
                <div id="trivia-content">
                    <div id="question-counter">Question 1 / 10</div> <!-- Question counter display -->
                    <h2 id="question"></h2>
                    <div id="answers"></div>
                </div>

                <script type="text/javascript">
                    const trivia_json_file_url = '<?php print($this->do->trivia_json_file_url); ?>'
                </script>
                <script type="text/javascript" src="<?php print(RequestHelper::$common_url_root); ?>/js/trivia.js"></script>
				
			<?php
		}

    }

?>