<?php

$server     = 'localhost';
$username   = 'root';
$password   = 'Friday13th';
$db         = 'language_learner';

// create connection
$conn       = mysqli_connect($server, $username, $password, $db);

// check connection
if (!$conn) {
    die("Connection to db failed: " . mysqli_connect_error() );
}