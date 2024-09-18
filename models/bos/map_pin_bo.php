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
					$do->title,
					$do->latitude,
					$do->longitude,
                    $do->popup_html,
                    $do->is_active,
                    $do->id
				]
			);
		}


        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function getDormitoryList() {
			$do_list = [];
			
			$records = $this->dao->getDormitoryList();

			if (empty($records)) {
				LogHelper::addWarning('There are no records of: ' . 'DormitoryMapPin');
			}
			else {
				foreach ($records as $record) {
					//$do_list[] = $this->do_factory->get($this->actor_name, $record);
                    $do_list[] = $this->do_factory->get("DormitoryMapPin", $record);
				}
			}
			
			return $do_list;
		}


    }

?>