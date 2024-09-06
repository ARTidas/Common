<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class PasswordBo {

        const PEPPER = 'PTIisLove';

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
        public static function getPepper() {
            return Self::PEPPER;
        }

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function getNewSalt($length = 12) {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }

            return $randomString;
        }

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function getHash($password, $salt, $pepper) {
            return password_hash(
                (
                    $pepper . $password . $salt
                ),
                PASSWORD_BCRYPT
            );
        }

    }

?>