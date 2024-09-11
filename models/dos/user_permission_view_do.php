<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class UserPermissionViewDo extends ViewDo {

        public $user_permission_do;
        public $user_do_list;
        public $permission_do_list;
        public $user_permission_do_list;

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        function __construct(
            $title                      = null,
            $description                = null,
            $user_permission_do         = null,
            $user_do_list               = null,
            $permission_do_list         = null,
            $user_permission_do_list    = null,
        ) {
			$this->title                    = $title;
            $this->description              = $description;
            $this->user_permission_do       = $user_permission_do;
            $this->user_do_list             = $user_do_list;
            $this->permission_do_list       = $permission_do_list;
            $this->user_permission_do_list  = $user_permission_do_list;
		}

    }

?>