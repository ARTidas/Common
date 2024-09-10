<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class MapPinCreateView extends ProjectAbstractView {

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
                            if (ActorHelper::isAttributeRequiredForMapPinCreate($key)) {
                                if ($key === 'popup_html') {
                                    ?>
                                        <div>
                                            <label for="<?php print($key); ?>"><?php print(ucfirst($key)); ?>:</label>
                                            <textarea name="<?php print($key); ?>"><?php print($value); ?></textarea>
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

                    <input type="submit" name="create" value="Create" />
                </form>
			<?php
		}

    }

?>