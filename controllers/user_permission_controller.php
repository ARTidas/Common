<?php

	$user_bo        	= $bo_factory->get(ActorHelper::USER);
    $permission_bo  	= $bo_factory->get(ActorHelper::PERMISSION);
	$user_permission_bo = $bo_factory->get(StringHelper::toPascalCase(RequestHelper::$actor_name));

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
