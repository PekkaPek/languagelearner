<?php

session_start();

include_once 'connection.php';

$query = "UPDATE `user` SET `tries` = `tries` + 1 WHERE login_name = '" . $_SESSION['loggedInUser'] . "'";
mysqli_query($conn, $query);