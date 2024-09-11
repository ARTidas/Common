<?php

    /* ********************************************************
	 * ********************************************************
	 * ********************************************************/
    class UserPermissionBo extends AbstractBo {

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function create(AbstractDo $do) {
            $this->validateDoForCreate($do);

            if (!$this->isDoValidForCreate($do)) {
                return false;
            }

            $last_insert_id = $this->dao->create([$do->user_id, $do->permission_id]);

            if ($last_insert_id) {
                LogHelper::addConfirmation('Created record with id: #' . $last_insert_id);
            }
            else {
                LogHelper::addWarning('Failed to create record!');
            }

			return $last_insert_id;
		}

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function validateDoForCreate(AbstractDo $do) {
			foreach ($do->getAttributes() as $key => $value) {
                if (ActorHelper::isAttributeRequiredForUserPermissionCreate($key)) {
                    if (empty($value)) {
                        LogHelper::addWarning('Please fill out the following attribute: ' . $key);
                    }
                }
            }
		}

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function isDoValidForCreate(AbstractDo $do) {
			foreach ($do->getAttributes() as $key => $value) {
                if (ActorHelper::isAttributeRequiredForUserPermissionCreate($key)) {
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
		public function update(AbstractDo $do) {
            $this->validateDoForUpdate($do);

            if (!$this->isDoValidForUpdate($do)) {
                return false;
            }

			return ($this->dao)->update(
				[
					$do->status,
					$do->id
				]
			);
		}

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function validateDoForUpdate(AbstractDo $do) {
			foreach ($do->getAttributes() as $key => $value) {
                if (ActorHelper::isAttributeRequiredForUserPermissionUpdate($key)) {
                    if (empty($value)) {
                        LogHelper::addWarning('Please fill out the following attribute: ' . $key);
                    }
                }
            }
		}

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function isDoValidForUpdate(AbstractDo $do) {
			foreach ($do->getAttributes() as $key => $value) {
                if (ActorHelper::isAttributeRequiredForUserPermissionUpdate($key)) {
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
		public function getListForReview() {
			$do_list = [];
			
			$records = $this->dao->getListForReview();
			
			if (empty($records)) {
				LogHelper::addWarning('There are no records of: ' . $this->actor_name);
			}
			else {
				foreach ($records as $record) {
					$do_list[] = $this->do_factory->get($this->actor_name, $record);
				}
			}
			
			return $do_list;
		}


    }

?>