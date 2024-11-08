<?php

    if (
        //!PermissionHelper::isUserAuthorized('Demonstrator') &&
        //!PermissionHelper::isUserAuthorized('Trivia presenter')
		false
    ) {
        header('Location: ' . RequestHelper::$url_root . '/user_permission/request');
        exit();
    }

	/* ********************************************************
	 * *** Lets control exectution by actor action... *********
	 * ********************************************************/
	switch (RequestHelper::$actor_action) {
		case '':
			RequestHelper::addError('No actor action detected...');
			break;
		default:
			require(
				RequestHelper::$file_root . '/controllers/' .
				RequestHelper::$actor_name . '_' . 
				RequestHelper::$actor_action . '_controller.php'
			);
	}

?>
