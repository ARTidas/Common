<?php

    if (
        //!PermissionHelper::isUserAuthorized('Demonstrator') &&
        !PermissionHelper::isUserAuthorized('Common administrator')
    ) {
        header('Location: ' . RequestHelper::$url_root . '/user_permission/request');
        exit();
    }

    $do = new (RequestHelper::$actor_class_name . 'Do');

    if (isset($_POST['modify']) && $_POST['modify'] === 'Modify') {
        //TODO: Abstract attribute assignments...
        $do->id         = $_POST['id'];
        $do->is_active  = $_POST['is_active'];
        $do->name       = $_POST['name'];
        
        LogHelper::addMessage('Modifying record with id: #' . $do->id);

        if ($bo->update($do)) {
            LogHelper::addConfirmation('Record updated successfully...');
        }
        else {
            LogHelper::addWarning('Modification failed!');
        }
    }

    $do_list = $bo->getList();

    if (isset($_POST['select']) && $_POST['select'] === 'Select') {
        $do->id = $_POST['id'];
        LogHelper::addMessage('Retrieving record with id: #' . $do->id);

        $do = $bo->get($do);
    }

    $view = new (RequestHelper::$actor_class_name . 'ModifyView')(
        new ViewDo(
            RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            'DESCRIPTION - ' . RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            $do_list,
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