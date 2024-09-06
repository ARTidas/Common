<?php

    $do = new (RequestHelper::$actor_class_name . 'Do');

    if (isset($_POST['login']) && $_POST['login'] === 'Login') {
        //TODO: Abstract attribute assignments...
        $do->email      = $_POST['email'];
        $do->password   = $_POST['password'];

        $bo->login($do);
    }

    $view = new (RequestHelper::$actor_class_name . ucfirst(RequestHelper::$actor_action) . 'View')(
        new ViewDo(
            RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            'DESCRIPTION - ' . RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            null,
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