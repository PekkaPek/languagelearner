<?php
if (session_status() === PHP_SESSION_NONE){session_start();}
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 15/05/16
 * Time: 12:03
 */

include_once('connection.php');

$query = "select picture_link, english from question";
$result = mysqli_query($conn, $query);

// Check if there is any rows returned
if (mysqli_num_rows($result) > 0) {

    // Store each picture link and name to array
    $links = array();
    $names = array();
    while ( $row = mysqli_fetch_array($result)) {
        array_push($links, $row['picture_link']);
        array_push($names, $row['english']);
    }
    
    // Choose random value from the array
    $chosen_entity = array_rand($links, 1);
    
    $link = $links[$chosen_entity];
    $name = $names[$chosen_entity];
    
    // Store the right answer for later checking
    $_SESSION['name'] = $name;
    
    // Show chosen image
    echo '<img class="question-img" src="' . $link . '" alt="Question image"' . '>';
}