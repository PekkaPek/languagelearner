<?php
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 27/05/16
 * Time: 13:15
 */

if (session_status() === PHP_SESSION_NONE){session_start();}

include_once('connection.php');
$query = "SELECT `tries`, `tries_right` FROM `user` WHERE `id` = {$_SESSION['id']}";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
echo $row['tries_right'] . " / " . $row['tries'];