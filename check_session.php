<?php
session_start();
if(!$_SESSION['loggedInUser']) {
    header('Location: login.php');
    die();
}