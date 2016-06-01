<?php
if (session_status() === PHP_SESSION_NONE){session_start();}
if(!$_SESSION['loggedInUser']) {
    header('Location: login.php');
    die();
}