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
        public function getHash($password, $salt) {
            return password_hash(
                $this->getSaltedPepperedPassword($password, $salt),
                PASSWORD_BCRYPT
            );
        }

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function getSaltedPepperedPassword($password, $salt) {
            return (self::PEPPER . $password . $salt);
        }

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function verifyPassword($password, $salt, $hash) {
            return password_verify(
                $this->getSaltedPepperedPassword($password, $salt),
                $hash
            );
        }

    }

?>