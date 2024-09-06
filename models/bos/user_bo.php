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

            $password_bo        = new PasswordBo();
            $do->password_salt  = $password_bo->getNewSalt();
            $user_dao_last_insert_id = $this->dao->create(
				[
                    $do->email
				]
            );

            $password_dao_last_insert_id = $this->dao->createPassword(
				[
                    $user_dao_last_insert_id,
					$password_bo->getHash(
                        $do->password,
                        $do->password_salt,
                        PasswordBo::PEPPER
                    ),
                    $do->password_salt
				]
            );

            LogHelper::addConfirmation('Created user record with id: #' . $user_dao_last_insert_id);
            LogHelper::addConfirmation('Created password record with id: #' . $password_dao_last_insert_id);

			return $user_dao_last_insert_id;
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function update(AbstractDo $do) {
            $this->validateDo($do);

            if (!$this->isDoValid($do)) {
                return false;
            }

			return ($this->dao)->update(
				[
					$do->task_type_id,
					$do->name,
                    $do->description,
                    $do->script,
					$do->is_active,
                    $do->last_executed_at,
					$do->id
				]
			);
		}

    }

?>