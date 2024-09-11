<?php

    /* ********************************************************
	 * ********************************************************
	 * ********************************************************/
    class PermissionBo extends AbstractBo {

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function create(AbstractDo $do) {
            $this->validateDoForCreate($do);

            if (!$this->isDoValidForCreate($do)) {
                return false;
            }

            $last_insert_id = $this->dao->create([$do->name]);

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
                if (ActorHelper::isAttributeRequiredForPermissionCreate($key)) {
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
                if (ActorHelper::isAttributeRequiredForPermissionCreate($key)) {
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
            $this->validateDoForCreate($do);

            if (!$this->isDoValidForCreate($do)) {
                return false;
            }

			return ($this->dao)->update(
				[
					$do->name,
                    $do->is_active,
                    $do->id
				]
			);
		}

    }

?>