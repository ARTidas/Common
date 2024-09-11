<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class UserPermissionReviewView extends ProjectAbstractView {

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
                                    if (ActorHelper::isAttributeRequiredForUserPermissionReview($key)) {
                                        print('<th>' . $key . '</th>');
                                    }
                                }
                            ?>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($this->do->user_permission_do_list as $do) {
                                print('<tr>');
                                    foreach ($do->getAttributes() as $key => $value) {
                                        if (ActorHelper::isAttributeRequiredForUserPermissionReview($key)) {
                                            print('<td>' . $value . '</td>');
                                        }
                                    }
                                    ?>
                                        <td>
                                            <form action="" method="post">
                                                <input 
                                                    type="hidden" 
                                                    id="id" 
                                                    name="id" 
                                                    value="<?php print($do->id); ?>" />
                                                <input type="submit" name="review" value="Approve" />
                                                <input type="submit" name="review" value="Decline" />
                                            </form>
                                        </td>
                                    <?php
                                print('</tr>');
                            }
                        ?>
                    </tbody>
                </table>
			<?php
		}

    }

?>