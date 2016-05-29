<!DOCTYPE HTML>
<?php
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 18/05/16
 * Time: 12:05
 */

?>

<html>
<head>
    <?php include('head.php'); ?>
</head>

<body>
    <!-- Login page -->
    <!--            -->
    <div data-role="page" id="login-page">

        <!-- header -->
        <div data-role="header">
            <h1>Language Learner</h1>
        </div>

        <!-- content -->
        <div data-role="content">

            <h1>Login</h1>
            <form action="#" id="login-form">
                <input type="text" placeholder="username" name="login-username" id="login-username"/>
                <input type="password" placeholder="password" name="login-password" id="login-password" />
                <input type="submit" value="Login" id="login-btn" />
            </form>

            <div id="login-error">
                Username or password is incorrect.<br>
                Please try again!
            </div>

            <div id="account-created">
                Account created succesfully.<br>
                You may now login using your credentials.
            </div><br><br>

            <div>
                Don't have account yet?<br>
                <a href="#sign-in" data-rel="popup">Sign in</a>
            </div>

            <div data-role="popup" id="sign-in" class="ui-content" data-position-to="window">
                <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                <h2>New account</h2>
                <form>
                    <input type="text" placeholder="Username" name="username" id="new-username" />
                    <input type="password" placeholder="Password" name="password" id="new-password" />
                    <input type="submit" value="Create" id="new-account-btn" />
                </form>
            </div>

        </div>

        <!-- footer -->
        <?php include('footer.html'); ?>
    </div>

</body>

</html>
