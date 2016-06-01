<?php
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 18/05/16
 * Time: 13:12
 */

include('connection.php');

$form_username = $_POST['username'];
$form_password = $_POST['password'];

// query the DB using the form username
$sql =  "select `id`, login_name, password from `user` where `login_name` = '$form_username'";

// store the result of the query
$result = mysqli_query($conn, $sql);

/*** check is username is right ***/
// username is right
if ( mysqli_num_rows($result) > 0) {

    /*** store information from DB to variables ***/
    while ( $row = mysqli_fetch_assoc($result) ) {
        $id = $row['id'];
        $user = $row['login_name'];
        $hashedPassword = $row['password'];
    }

        /*** check if password is right ***/
        // pw is right
        if (password_verify($form_password, $hashedPassword)) {
            if (session_status() === PHP_SESSION_NONE){session_start();}
            $_SESSION['loggedInUser'] = $user;
            $_SESSION['id'] = $id;
            mysqli_close($conn);
            echo 'login successful';
        // pw is not right
        } else {
            mysqli_close($conn);
            echo 'false';
        }

    // username is not right
} else {
    mysqli_close($conn);
    echo 'false';
}