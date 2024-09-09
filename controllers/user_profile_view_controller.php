<?php

    if (isset($_POST['modify']) && $_POST['modify'] === 'Update') {
        //TODO: Make this abstract!!!
        $do->name               = $_POST['name'];
        $do->neptun_code        = $_POST['neptun_code'];
        $do->phone              = $_POST['phone'];
        $do->birthday_at        = $_POST['birthday_at'];
        
        LogHelper::addMessage('Modifying record with id: #' . $do->id);

        if ($bo->updateProfile($do)) {
            LogHelper::addConfirmation('Record updated successfully...');
        }
        else {
            LogHelper::addWarning('Modification failed!');
        }
    }

    $view = new (RequestHelper::$actor_class_name . ucfirst(RequestHelper::$actor_action) . 'View')(
        new ViewDo(
            RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            'DESCRIPTION - ' . RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            null,
            $do //Here comes the user profile do...
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