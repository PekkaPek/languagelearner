<?php
session_start();
if(!$_SESSION['loggedInUser']) {
    header('Location: http://localhost:8888/languagelearner/login.php');
    die();
}