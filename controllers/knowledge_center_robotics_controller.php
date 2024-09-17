<?php

	/* ********************************************************
	 * *** Lets control exectution by actor action... *********
	 * ********************************************************/
	switch (RequestHelper::$actor_action) {
		case '':
			RequestHelper::addError('No actor action detected...');
			break;
		default:
            $view = new (RequestHelper::$actor_class_name . ucfirst(RequestHelper::$actor_action) . 'View')(
                new ViewDo(
                    RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
                    'DESCRIPTION - ' . RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
                    null,
                    null //Here comes the user profile do...
                ),
            );
	}

    $view->displayHTMLOpen();
    $view->displayHeader();
    $view->displayMenu();
    $view->displayContent();
    $view->displayFooter();
    $view->displayLogs();
    $view->displayHTMLClose();

?>