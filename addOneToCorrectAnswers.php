<?php

if (session_status() === PHP_SESSION_NONE){session_start();}

include_once 'connection.php';

$query = "UPDATE `user` SET tries_right = tries_right + 1 WHERE login_name =  '" . $_SESSION['loggedInUser'] . "'";
mysqli_query($conn, $query);