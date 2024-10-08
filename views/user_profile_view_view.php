<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class UserProfileViewView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <h1>
                    <?php print(RequestHelper::$actor_class_name); ?>
                    <?php print(RequestHelper::$actor_action); ?>
                </h1>

                <?php
                    if ($_SESSION['user_id'] != $this->do->do->id) {
                        ?>
                            <section id="profile">
                        <?php
                        foreach ($this->do->do->getAttributes() as $key => $value) {
                            if (ActorHelper::isAttributeRequiredForUserProfileView($key)) {
                                ?>
                                    <div><?php print($key); ?>:</div>
                                    <div><?php print($value); ?></div>
                                <?php
                            }
                        }
                        ?>
                            <div>Prophile photo:</div>
                            <div>
                                <?php
                                    if (
                                        !empty($this->do->do->profile_large_file_path) && 
                                        file_exists($this->do->do->profile_large_file_path)
                                    ) {
                                        print('<td><img src="' . $this->do->do->profile_large_url . '"></td>');
                                    }
                                ?>
                            </div>
                            </section>
                        <?php
                    }
                    else {
                ?>

                        <form method="post" action="" enctype="multipart/form-data">
                            
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

                            <?php
                                foreach ($this->do->do->getAttributes() as $key => $value) {
                                    if (ActorHelper::isAttributeRequiredForUserProfileView($key)) {
                                        if ($key === 'birthday_at') {
                            ?>
                                            <div>
                                                <label for="<?php print($key); ?>"><?php print(ucfirst($key)); ?>:</label>
                                                <input 
                                                    type="date" 
                                                    id="<?php print($key); ?>" 
                                                    name="<?php print($key); ?>" 
                                                    value="<?php print(substr($value, 0, 10)); ?>" />
                                            </div>
                            <?php
                                        }
                                        else {
                            ?>
                                            <div>
                                                <label for="<?php print($key); ?>"><?php print(ucfirst($key)); ?>:</label>
                                                <input 
                                                    type="text" 
                                                    id="<?php print($key); ?>" 
                                                    name="<?php print($key); ?>" 
                                                    value="<?php print($value); ?>" />
                                            </div>
                            <?php
                                        }
                                    }
                                }
                            ?>
                            <div>
                                <label for="image_file">Profile picture:</label>
                                <input
                                    type="file"
                                    id="image_file"
                                    name="image_file"
                                    value="" />
                                <?php
                                    if (file_exists($this->do->do->profile_icon_file_path)) {
                                        print('<td><img src="' . $this->do->do->profile_icon_url . '"></td>');
                                    }
                                ?>
                            </div>

                            <input type="submit" name="modify" value="Update" />
                        </form>
			    <?php
            }
		}

    }

?>