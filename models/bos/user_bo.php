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
                }
                else {
                    LogHelper::addWarning('Incorrect password!');
                }
            }
            else {
                LogHelper::addWarning('Was not able to find account for: ' . $_POST['email']);
            }
            
		}

    }

?>