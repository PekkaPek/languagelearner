<?php
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 23/05/16
 * Time: 13:09
 */
session_start();
include_once('connection.php');
$sql = "SELECT time_between_images FROM `settings` WHERE `user_id` = {$_SESSION['id']}";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $time_between_images = $row['time_between_images'];
    }
    echo $time_between_images;
} else {
    echo 7;
}

