<?php

    /* ********************************************************
	 * ********************************************************
	 * ********************************************************/
    class UserDo extends AbstractDo {

        public $email;
        public $password;
        public $password_again;
        public $password_salt;
        public $password_hash;

        public $name;
        public $neptun_code;
        public $phone;

    }

?>