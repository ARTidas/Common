<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class ActorHelper {

		const USER 		= 'User';
        const TASK 		= 'Task';
        const TASK_TYPE = 'TaskType';

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
        public static function isAttributeRequiredForList($input) {
            if (
				$input === 'class_actor' ||
				$input === 'password' ||
				$input === 'password_again' ||
				$input === 'password_salt' ||
				$input === 'password_hash'
			) {
				return false;
			}

			return true;
        }

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
        public static function isAttributeRequiredForUserList($input) {
            if (
				$input === 'class_actor' ||
				$input === 'password' ||
				$input === 'password_again' ||
				$input === 'password_salt' ||
				$input === 'password_hash' ||
				$input === 'is_active' ||
				$input === 'created_at' ||
				$input === 'updated_at'
			) {
				return false;
			}

			return true;
        }

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
        public static function isAttributeRequiredForView($input) {
            if (
				$input === 'name' ||
				$input === 'neptun_code' ||
				$input === 'phone'
			) {
				return true;
			}

			return false;
        }

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
        public static function isAttributeRequiredForArticleList($input) {
            if (
				$input === 'class_actor' ||
				$input === 'is_active' ||
				$input === 'created_at' ||
				$input === 'content_full'
			) {
				return false;
			}

			return true;
        }

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
        public static function isAttributeRequiredForCreation($input) {
            if (
				$input === 'class_actor' ||
				$input === 'last_executed_at' ||
				$input === 'password_salt' ||
				$input === 'password_hash' ||
				$input === 'id' ||
				$input === 'is_active' ||
				$input === 'created_at' ||
				$input === 'updated_at'
			) {
				return false;
			}

			return true;
        }

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
        public static function isAttributeRequiredForUserCreation($input) {
            if (
				$input === 'email' ||
				$input === 'password' ||
				$input === 'password_again'
			) {
				return true;
			}

			return false;
        }

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
        public static function isAttributeRequiredForModification($input) {
            if (
				$input === 'class_actor' ||
				$input === 'created_at' ||
				$input === 'updated_at'
			) {
				return false;
			}

			return true;
        }

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
		public static function isAttributeRequiredForLogin($input) {
			if (
				$input === 'email' ||
				$input === 'password'
			) {
				return true;
			}

			return false;
		}

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
        public static function isAttributeRequiredForUserRegistration($input) {
            if (
				$input === 'email' ||
				$input === 'password' ||
				$input === 'password_again'
			) {
				return true;
			}

			return false;
        }

    }