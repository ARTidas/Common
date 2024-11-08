<?php

    $view = new ('TriviaViewView')(
        new TriviaViewDo(
            RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            'DESCRIPTION - ' . RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            'https://pti.unithe.hu:8443/common/js/json/trivia_pti_2.json'
        ),
    );

    $view->displayHTMLOpen();
    $view->displayContent();
    $view->displayHTMLClose();

?>