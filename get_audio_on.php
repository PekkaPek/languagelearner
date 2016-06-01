<?php
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 24/05/16
 * Time: 09:42
 */

if (session_status() === PHP_SESSION_NONE){session_start();}

include_once('connection.php');
$sql = "SELECT `play_audio_example` FROM `settings` WHERE `user_id` = {$_SESSION['id']}";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $play_audio_example = $row['play_audio_example'];
    }
}
