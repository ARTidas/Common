<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class ViewDo {

        public $title;
        public $description;
        public $do_list;
        public $do;
        public $search_string;

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        function __construct(
            $title          = null,
            $description    = null,
            $do_list        = null,
            $do             = null,
            $search_string  = null
        ) {
			$this->title            = $title;
            $this->description      = $description;
            $this->do_list          = $do_list;
            $this->do               = $do;
            $this->search_string    = $search_string;
		}

    }

?>