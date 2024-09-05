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

			return ($this->dao)->create(
				[
                    $do->task_type_id,
					$do->name,
                    $do->description,
                    $do->script
				]
			);
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