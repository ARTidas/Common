<?php

    if (
        //!PermissionHelper::isUserAuthorized('Demonstrator') &&
        !PermissionHelper::isUserAuthorized('Common administrator')
    ) {
        header('Location: ' . RequestHelper::$url_root . '/user_permission/request');
        exit();
    }

    $user_permission_do = new (RequestHelper::$actor_class_name . 'Do');

    if (isset($_POST['review'])) {
        //TODO: Abstract attribute assignments...
        $user_permission_do->status = $_POST['review'] === 'Approve' ? 'APPROVED' : 'DENIED';
        $user_permission_do->id     = $_POST['id'];

        $user_permission_bo->update($user_permission_do);
    }

    //$user_permission_do_list = $user_permission_bo->getList();
    $user_permission_do_list = $user_permission_bo->getListForReview();

    $view = new (RequestHelper::$actor_class_name . ucfirst(RequestHelper::$actor_action) . 'View')(
        new UserPermissionViewDo(
            RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            'DESCRIPTION - ' . RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            $user_permission_do,
            null, //$user_do_list,
            null, //$permission_do_list
            $user_permission_do_list
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