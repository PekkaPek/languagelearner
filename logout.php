<?php
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 22/05/16
 * Time: 11:08
 */
if (session_status() === PHP_SESSION_NONE){session_start();}


// Empty session variables
$_SESSION = array();

// Delete session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy session
session_destroy();

header('Location: login.php');
die();
