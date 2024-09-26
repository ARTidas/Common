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
        public $birthday_at;
        public $address;
        public $tax_number;
        public $demonstrator_contract_number;

        public $profile_icon_file_path;
        public $profile_small_file_path;
        public $profile_medium_file_path;
        public $profile_large_file_path;
        public $profile_icon_url;
        public $profile_small_url;
        public $profile_medium_url;
        public $profile_large_url;

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        function __construct($attributes = null, $class_actor = null) {
            $this->class_actor = $class_actor;
            
            if ($attributes != null) {
                foreach ($attributes as $key => $value) {
                    $this->$key = $value;
                }
            }

            $this->profile_icon_file_path    = RequestHelper::$common_file_root . '/cdn/user_profile_pictures/' . 'user_' . $this->id . '_icon.png';
            $this->profile_small_file_path   = RequestHelper::$common_file_root . '/cdn/user_profile_pictures/' . 'user_' . $this->id . '_small.png';
            $this->profile_medium_file_path  = RequestHelper::$common_file_root . '/cdn/user_profile_pictures/' . 'user_' . $this->id . '_medium.png';
            $this->profile_large_file_path   = RequestHelper::$common_file_root . '/cdn/user_profile_pictures/' . 'user_' . $this->id . '_large.png';
            $this->profile_icon_url          = RequestHelper::$common_url_root . '/cdn/user_profile_pictures/' . 'user_' . $this->id . '_icon.png';
            $this->profile_small_url         = RequestHelper::$common_url_root . '/cdn/user_profile_pictures/' . 'user_' . $this->id . '_small.png';
            $this->profile_medium_url        = RequestHelper::$common_url_root . '/cdn/user_profile_pictures/' . 'user_' . $this->id . '_medium.png';
            $this->profile_large_url         = RequestHelper::$common_url_root . '/cdn/user_profile_pictures/' . 'user_' . $this->id . '_large.png';
        }

    }

?>