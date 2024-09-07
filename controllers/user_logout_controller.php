<?php

    // Inactivate the user_login record
    ($bo_factory->get(ActorHelper::USER))->logout(
        $_SESSION['user_id'],
        $_COOKIE['PHPSESSID']
    );

    var_dump(LogHelper::getLogs());

    // Unset all session variables
    $_SESSION = array();

    // If the session cookie exists, delete it
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Destroy the session
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session

    // Optionally remove any user-specific cookies
    if (isset($_COOKIE['user'])) {
        setcookie(
            'user',
            '',
            time() - 3600,
            "/"
        ); // Delete the "user" cookie
    }

    header('Location: ' . RequestHelper::$url_root . '/user/login');
    exit();

?>