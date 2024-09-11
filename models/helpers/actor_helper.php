<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class ActorHelper {

		const USER 			= 'User';
		const MAP_PINS  	= 'MapPin';
		const PERMISSION 	= 'Permission';
        const TASK 			= 'Task';
        const TASK_TYPE 	= 'TaskType';

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
				$input === 'updated_at' ||
				$input === 'profile_icon_file_path' ||
				$input === 'profile_icon_url' ||
				$input === 'profile_small_file_path' ||
				$input === 'profile_small_url' ||
				$input === 'profile_medium_file_path' ||
				$input === 'profile_medium_url' ||
				$input === 'profile_large_file_path' ||
				$input === 'profile_large_url'
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
				$input === 'phone' ||
				$input === 'birthday_at'
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

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
		public static function isAttributeRequiredForMapPinCreate($input) {
			if (
				$input === 'title' ||
				$input === 'latitude' ||
				$input === 'longitude' ||
				$input === 'popup_html'
			) {
				return true;
			}

			return false;
		}


		/* ********************************************************
         * ********************************************************
         * ********************************************************/
		public static function isAttributeRequiredForMapPinUpdate($input) {
			if (
				$input === 'id' ||
				$input === 'title' ||
				$input === 'latitude' ||
				$input === 'longitude' ||
				$input === 'popup_html' ||
				$input === 'is_active'
			) {
				return true;
			}

			return false;
		}


		/* ********************************************************
         * ********************************************************
         * ********************************************************/
		public static function isAttributeRequiredForPermissionCreate($input) {
			if (
				$input === 'name'
			) {
				return true;
			}

			return false;
		}

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
		public static function isAttributeRequiredForPermissionUpdate($input) {
			if (
				$input === 'is_active' ||
				$input === 'name'
			) {
				return true;
			}

			return false;
		}

		/* ********************************************************
         * ********************************************************
         * ********************************************************/
		public static function isAttributeRequiredForUserPermissionCreate($input) {
			if (
				$input === 'user_id' ||
				$input === 'permission_id'
			) {
				return true;
			}

			return false;
		}


		/* ********************************************************
         * ********************************************************
         * ********************************************************/
		public static function isAttributeRequiredForUserPermissionReview($input) {
			if (
				$input === 'id' ||
				//$input === 'user_id' ||
				$input === 'user_name' ||
				//$input === 'permission_id' ||
				$input === 'permission_name' ||
				$input === 'status'
			) {
				return true;
			}

			return false;
		}


		/* ********************************************************
         * ********************************************************
         * ********************************************************/
		public static function isAttributeRequiredForUserPermissionUpdate($input) {
			if (
				$input === 'id' ||
				//$input === 'user_id' ||
				//$input === 'user_name' ||
				//$input === 'permission_id' ||
				//$input === 'permission_name' ||
				$input === 'status'
			) {
				return true;
			}

			return false;
		}

    }