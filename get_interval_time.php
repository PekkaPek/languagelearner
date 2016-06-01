<?php
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 24/05/16
 * Time: 12:32
 */

if (session_status() === PHP_SESSION_NONE){session_start();}

include_once('connection.php');
$sql = "SELECT `time_between_images` FROM `settings` WHERE `user_id` = {$_SESSION['id']}";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
echo $row['time_between_images'];