<?php

$server     = 'localhost';
$username   = 'usramazeme';
$password   = 'Am@Z3mE';
$db         = 'mobileweb-amazeme';

// create connection
$conn       = mysqli_connect($server, $username, $password, $db);

// check connection
if (!$conn) {
    die("Connection to db failed: " . mysqli_connect_error() );
}