<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class TriviaViewDo extends ViewDo {

        public $title;
        public $description;
        public $trivia_json_file_url;

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        function __construct(
            $title                  = null,
            $description            = null,
            $trivia_json_file_url   = null
        ) {
			$this->title                = $title;
            $this->description          = $description;
            $this->trivia_json_file_url = $trivia_json_file_url;
		}

    }

?>