<?php
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 24/05/16
 * Time: 11:18
 */

session_start();

/*** Handling POST parameters ***/
$seconds_between_images = $_POST['seconds_between_images'];
$audio_setting = $_POST['audio_setting'];
if ($audio_setting === 'on') {
    $audio_setting_bit = 1;
} else {
    $audio_setting_bit = 0;
}

/*** Setting updates ***/
include_once('connection.php');
$sql = "UPDATE `language_learner`.`settings` SET `time_between_images` = {$seconds_between_images},`play_audio_example` = b'{$audio_setting_bit}' WHERE `settings`.`user_id` = {$_SESSION['id']}";
mysqli_query($conn, $sql);