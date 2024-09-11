<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class UserPermissionRequestView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <h1>Request <?php print(RequestHelper::$actor_class_name); ?></h1>

				<form method="post" action="">
                    
                    <div class="log_warnings">
                        <?php
                            foreach (LogHelper::getWarnings() as $log) {
                                print('<p>' . $log . '</p><hr />');
                            }
                        ?>
                    </div>
                    <div class="log_confirmations">
                        <?php
                            foreach (LogHelper::getConfirmations() as $log) {
                                print('<p>' . $log . '</p><hr />');
                            }
                        ?>
                    </div>

                    <div>
                        <label for="user_id">User ID:</label>
                        <select name="user_id">
                            <option>-- Select --</option>
                            <?php
                                foreach ($this->do->user_do_list as $do) {
                                    ?>
                                        <option 
                                            value="<?php print($do->id) ?>"
                                            <?php if ($do->id == $this->do->user_permission_do->user_id) {print('selected');} ?>
                                        >
                                            <?php print('#' . $do->id . ' - ' . $do->name); ?>
                                        </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="permission_id">Permission ID:</label>
                        <select name="permission_id">
                            <option>-- Select --</option>
                            <?php
                                foreach ($this->do->permission_do_list as $do) {
                                    ?>
                                        <option 
                                            value="<?php print($do->id) ?>"
                                            <?php if ($do->id == $this->do->user_permission_do->permission_id) {print('selected');} ?>
                                        >
                                            <?php print('#' . $do->id . ' - ' . $do->name); ?>
                                        </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>

                    <input type="submit" name="request" value="Request" />
                </form>
				
			<?php
		}

    }

?>