<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class UserLoginView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <h1>
                    <?php print(RequestHelper::$actor_class_name); ?>
                    <?php print(RequestHelper::$actor_action); ?>
                </h1>

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

                    <?php
                        foreach ($this->do->do->getAttributes() as $key => $value) {
                            if (ActorHelper::isAttributeRequiredForLogin($key)) {
                                if ($key === 'password' || $key === 'password_again') {
                                    ?>
                                        <div>
                                            <label for="<?php print($key); ?>"><?php print(ucfirst($key)); ?>:</label>
                                            <input 
                                                type="password" 
                                                id="<?php print($key); ?>" 
                                                name="<?php print($key); ?>" 
                                                value="<?php print($value); ?>" />
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

                    <input type="submit" name="login" value="Login" />
                </form>
			<?php
		}

    }

?>