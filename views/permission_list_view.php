<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class PermissionListView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <h1>
                    <?php print(RequestHelper::$actor_class_name); ?>
                    <?php print(RequestHelper::$actor_action); ?>
                </h1>

				<table>
                    <thead>
                        <tr>
                            <?php
                                foreach ((new (RequestHelper::$actor_class_name . 'Do'))->getAttributes() as $key => $value) {
                                    if (ActorHelper::isAttributeRequiredForUserList($key)) {
                                        print('<th>' . $key . '</th>');
                                    }
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($this->do->do_list as $do) {
                                print('<tr>');
                                    foreach ($do->getAttributes() as $key => $value) {
                                        if (ActorHelper::isAttributeRequiredForUserList($key)) {
                                            if ($key === 'user_list') {
                                                print('<td>' . str_replace(',', "<br/>", $value) . '</td>');
                                            }
                                            else {
                                                print('<td>' . $value . '</td>');
                                            }
                                        }
                                    }
                                print('</tr>');
                            }
                        ?>
                    </tbody>
                </table>
			<?php
		}

    }

?>