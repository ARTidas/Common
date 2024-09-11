<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class UserListView extends ProjectAbstractView {

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
                            <th>PP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($this->do->do_list as $do) {
                                print('<tr>');
                                    foreach ($do->getAttributes() as $key => $value) {
                                        if (ActorHelper::isAttributeRequiredForUserList($key)) {
                                            if ($key === 'birthday_at' && !empty($value)) {
                                                print('<td>' . DatetimeHelper::formatToBirthday($value) . '</td>');
                                            }
                                            elseif ($key === 'id') {
                                                print(
                                                    '<td>' . 
                                                        '<a href="' . RequestHelper::$common_url_root . '/user_profile/view/' . $value . '">' . 
                                                            $value . 
                                                        '</a>' .
                                                    '</td>'
                                                );
                                            }
                                            else {
                                                print('<td>' . $value . '</td>');
                                            }
                                        }
                                    }

                                    if (file_exists($do->profile_icon_file_path)) {
                                        print('<td><img src="' . $do->profile_icon_url . '"></td>');
                                    }
                                    else {
                                        print('<td>&nbsp;</td>');
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