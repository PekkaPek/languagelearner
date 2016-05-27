<?php
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 21/05/16
 * Time: 22:23
 */

$newUsername = $_POST['newUsername'];
$newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

include_once('connection.php');
$sql = "INSERT INTO `user` (login_name, `password`, tries, tries_right) VALUES ('$newUsername', '$newPassword', 0, 0)";
mysqli_query($conn, $sql);

$newUserId = mysqli_insert_id($conn);

$sql2 = "INSERT INTO `settings` (`user_id`, `time_between_images`, `play_audio_example` ) VALUES ('$newUserId', 5, 1)";
mysqli_query($conn, $sql2);