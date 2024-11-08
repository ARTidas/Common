<?php

    /* ********************************************************
	 * ********************************************************
	 * ********************************************************/
    class UserBo extends AbstractBo {

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function create(AbstractDo $do) {
            $this->validateDo($do);

            if (!$this->isDoValid($do)) {
                return false;
            }

            $password_bo                = new PasswordBo();
            $do->password_salt          = $password_bo->getNewSalt();
            $user_dao_last_insert_id    = $this->dao->create([$do->email]);

            if ($user_dao_last_insert_id) {
                LogHelper::addConfirmation('Created user record with id: #' . $user_dao_last_insert_id);

                $password_dao_last_insert_id = $this->dao->createPassword(
                    [
                        $user_dao_last_insert_id,
                        $password_bo->getHash(
                            $do->password,
                            $do->password_salt
                        ),
                        $do->password_salt
                    ]
                );

                if ($password_dao_last_insert_id) {
                    LogHelper::addConfirmation('Created password record with id: #' . $password_dao_last_insert_id);

                    //Lets redirect the user upon successfull registration:
                    header('Location: ' . RequestHelper::$url_root . '/user/login');
                    exit();
                }
                else {
                    LogHelper::addWarning('Failed to create user password!');
                }
            }
            else {
                LogHelper::addWarning('Failed to create user registration!');
            }

			return $user_dao_last_insert_id;
		}

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function validateDo(AbstractDo $do) {
			foreach ($do->getAttributes() as $key => $value) {
                if (ActorHelper::isAttributeRequiredForUserCreation($key)) {
                    if (empty($value)) {
                        LogHelper::addWarning('Please fill out the following attribute: ' . $key);
                    }
                }
            }

			if (isset($do->password) && isset($do->password_again)) {
				if ($do->password !== $do->password_again) {
					LogHelper::addWarning('Password and retyped password does not match!');
				}
			}
		}

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function isDoValid(AbstractDo $do) {
			foreach ($do->getAttributes() as $key => $value) {
                if (ActorHelper::isAttributeRequiredForUserCreation($key)) {
                    if (empty($value)) {
                        
                        return false;
                    }
                }
            }

            return true;
		}


		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function login(AbstractDo $do) {
            $this->validateDoForLogin($do);

            if (!$this->isDoValidForLogin($do)) {
                return false;
            }
            $do = $this->do_factory->get($this->actor_name, $this->dao->getByEmail([$do->email]));
            if (isset($do->id)) {
                LogHelper::addMessage('Found user with id: #' . $do->id);

                $password_bo = new PasswordBo();
                if (                    
                    $password_bo->verifyPassword(
                        $_POST['password'],
                        $do->password_salt,
                        $do->password_hash
                    )
                ) {
                    LogHelper::addConfirmation('Login successfull!');
                    
                    LogHelper::addConfirmation('Generating session...');
                    //session_regenerate_id(true);
                    $_SESSION['user_id']        = $do->id;
                    $_SESSION['user_name']      = $do->name;
                    $_SESSION['is_logged_in']   = true;

                    LogHelper::addConfirmation('Generating cookie...');
                    /*setcookie(
                        'user_id', 
                        $do->id, 
                        time() + (86400 * 30), // 30 days expiration time
                        "/", 
                        "", 
                        true, // Secure flag: only send over HTTPS
                        true // HttpOnly flag: JavaScript cannot access the cookie
                    );*/
                    //TODO: This does not create the COOKIE with user_id ... :(
                    setcookie(
                        'user_id',
                        $do->id,
                        [
                            'expires' => time() + (86400 * 30), // 30 days expiration time,
                            'path' => '/',
                            'domain' => '*.unithe.hu',
                            'secure' => true, // Secure flag: only send over HTTPS
                            'httponly' => true, // HttpOnly flag: JavaScript cannot access the cookie
                            'samesite' => 'None',
                        ]
                    );
                    
                    $login_dao_last_insert_id = $this->dao->createLogin([
                        $do->id,
                        $_COOKIE['PHPSESSID'],
                        SecurityBo::getRequestDetailsInJSON()
                    ]);
                    if ($login_dao_last_insert_id) {
                        LogHelper::addConfirmation('Created login record with id: #' . $login_dao_last_insert_id);
                        // Lets redirect the user after a successfull login attempt...
                        header('Location: ' . RequestHelper::$url_root . '/user_profile/view');
                        exit();
                    }
                    else {
                        LogHelper::addWarning('Failed to create login record!');
                    }
                }
                else {
                    LogHelper::addWarning('Incorrect password!');
                }
            }
            else {
                LogHelper::addWarning('Was not able to find account for: ' . $_POST['email']);
            }
		}

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function get($id) {
			$do_factory = new DoFactory();
			
			$records = $this->dao->get([$id]);
			if (isset($records[0])) {
				$record = $records[0];
			}

			if (empty($record)) {
				LogHelper::addWarning('Could not find record for: ' . $this->actor_name);
			}
			else {
				return $do_factory->get($this->actor_name, $record);
			}
			
			return false;
		}

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function logout($user_id, $session_id) {
            return $this->dao->deleteLogin([$user_id, $session_id]);
        }

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function updateProfile($do) {
			$do_factory = new DoFactory();
			
            if ($this->dao->deActivateProfiles($do)) {
                $id = $this->dao->createProfile($do);

                if (empty($id)) {
                    LogHelper::addWarning('Could not find record for: ' . $this->actor_name);
                }
                else {
                    LogHelper::addConfirmation('Sucessfully created profile with id: #' . $id);
                }
                
                return $do;
            }
            else {
                LogHelper::addWarning('Was not able to deactivate previous user profile.');
            }

            return false;
		}

    }

?>