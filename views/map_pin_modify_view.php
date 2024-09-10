<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class MapPinModifyView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <h1>Select <?php print(RequestHelper::$actor_class_name); ?></h1>

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
                        <label for="id">ID:</label>
                        <select name="id">
                            <option>-- Select --</option>
                            <?php
                                foreach ($this->do->do_list as $do) {
                                    ?>
                                        <option 
                                            value="<?php print($do->id) ?>"
                                            <?php if ($do->id == $this->do->do->id) {print('selected');} ?>
                                        >
                                            <?php print('#' . $do->id . ' - ' . $do->title); ?>
                                        </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>

                    <input type="submit" name="select" value="Select" />
                </form>

                <hr />
                <h1>Modify <?php print(RequestHelper::$actor_class_name); ?></h1>

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
                            if (ActorHelper::isAttributeRequiredForMapPinUpdate($key)) {
                                if ($key === 'id') {
                                    ?>
                                        <input 
                                            type="hidden" 
                                            id="<?php print($key); ?>" 
                                            name="<?php print($key); ?>" 
                                            value="<?php print($value); ?>" />
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

                    <input type="submit" name="modify" value="Modify" />
                </form>
			<?php
		}

    }

?>