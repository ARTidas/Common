<?php

	// Redirect user if no sesion exists.
    if (!isset($_SESSION['user_id'])) {
        header('Location: ' . RequestHelper::$url_root . '/user/login');
        exit();
    }

	//$bo = $bo_factory->get(StringHelper::toPascalCase(RequestHelper::$actor_name));
    $bo = $bo_factory->get(ActorHelper::USER);
	$do = $bo->get(empty(RequestHelper::$actor_id) ? $_SESSION['user_id'] : RequestHelper::$actor_id);

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