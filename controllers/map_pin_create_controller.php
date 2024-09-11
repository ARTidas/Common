<?php

    if (
        //!PermissionHelper::isUserAuthorized('Demonstrator') &&
        !PermissionHelper::isUserAuthorized('Map administrator')
    ) {
        header('Location: ' . RequestHelper::$url_root . '/user_permission/request');
        exit();
    }

    $do = new (RequestHelper::$actor_class_name . 'Do');

    if (isset($_POST['create']) && $_POST['create'] === 'Create') {
        //TODO: Abstract attribute assignments...
        $do->title      = $_POST['title'];
        $do->latitude   = $_POST['latitude'];
        $do->longitude  = $_POST['longitude'];
        $do->popup_html = $_POST['popup_html'];

        $bo->create($do);
    }

    $view = new (RequestHelper::$actor_class_name . ucfirst(RequestHelper::$actor_action) . 'View')(
        new ViewDo(
            RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            'DESCRIPTION - ' . RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            null, //$do_list
            $do
        ),
    );

    $view->displayHTMLOpen();
    $view->displayHeader();
    $view->displayMenu();
    $view->displayContent();
    $view->displayFooter();
    $view->displayLogs();
    $view->displayHTMLClose();

?>