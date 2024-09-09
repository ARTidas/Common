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
                                            else {
                                                print('<td>' . $value . '</td>');
                                            }
                                        }
                                    }

                                    $user_profile_file_path = RequestHelper::$common_url_root . '/cdn/user_profile_pictures/' . 'user_' . $do->id . '_icon.png';
                                    $user_profile_url       = RequestHelper::$common_file_root . '/cdn/user_profile_pictures/' . 'user_' . $do->id . '_icon.png';
                                    if (file_exists($user_profile_url)) {
                                        print('<td><img src="' . $user_profile_file_path . '"></td>');
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