<?php

    /* ********************************************************
	 * ********************************************************
	 * ********************************************************/
    class MapPinBo extends AbstractBo {

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function create(AbstractDo $do) {
            $this->validateDoForCreate($do);

            if (!$this->isDoValidForCreate($do)) {
                return false;
            }

            $last_insert_id = $this->dao->create([
                $do->title,
                $do->latitude,
                $do->longitude,
                $do->popup_html
            ]);

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
                if (ActorHelper::isAttributeRequiredForMapPinCreate($key)) {
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
                if (ActorHelper::isAttributeRequiredForMapPinCreate($key)) {
                    if (empty($value)) {
                        
                        return false;
                    }
                }
            }

            return true;
		}

    }

?>