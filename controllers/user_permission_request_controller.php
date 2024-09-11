<?php

    $user_permission_do = new (RequestHelper::$actor_class_name . 'Do');

    $user_do_list       = $user_bo->getList();
    $permission_do_list = $permission_bo->getList();

    if (isset($_POST['request']) && $_POST['request'] === 'Request') {
        //TODO: Abstract attribute assignments...
        $user_permission_do->user_id        = $_POST['user_id'];
        $user_permission_do->permission_id  = $_POST['permission_id'];

        $user_permission_bo->create($user_permission_do);
    }

    $view = new (RequestHelper::$actor_class_name . ucfirst(RequestHelper::$actor_action) . 'View')(
        new UserPermissionViewDo(
            RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            'DESCRIPTION - ' . RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            $user_permission_do,
            $user_do_list,
            $permission_do_list
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