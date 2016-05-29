<?php
session_start();
include('check_session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php'); ?>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="assets/js/index_script.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/loginScript.js"></script>
</head>

<body>
    <div data-role="page" id="question">

        <!-- Header -->
        <div data-role="header">
            <a href="index.php" data-icon="home">Menu</a>
            <h1>Language learner</h1>
            <a href="logout.php" data-icon="power" class="ui-btn-right">Logout <?php echo $_SESSION['loggedInUser']; ?></a>
        </div>

        <!-- Content -->
        <div data-role="content">
            <?php include_once('printRandomPicture.php')?>
            <form>
                What is this?
                <input type="text" name="answer" id="answer-txt">
                <input type="submit" value="Answer" id="answer_btn">
            </form>

            <!-- Wrong answers-->
            <div id="wrong-answer-first-time">
                Wrong answer.<br><br>
                Try once more.
            </div>

            <div id="wrong-answer-second-time">
                Wrong answer<br><br>
                Right answer: <?php echo $_SESSION['name']; ?><br><br>
                Next question<br>
                <progress value="0" max="100" class="counter"></progress>
            </div>

            <!-- Right answer -->
            <div id="right-answer">
                Right answer: <?php echo $_SESSION['name']; ?><br><br>
                Next question<br>
                <progress value="0" max="100" class="counter"></progress>
            </div>
        </div>

        <!-- Footer -->
        <?php include('footer.html'); ?>
        <script src="assets/js/index_script.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/loginScript.js"></script>
    </div>

    <div data-role="page" id="statistics">
        <div data-role="content">
            Right answers / Total questions
            <div id="statistics-box"></div>
            <br><br>Swipe to see user info
        </div>
        <script src="assets/js/index_script.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/loginScript.js"></script>
    </div>

    <div data-role="page" id="statistics-user">
        <div data-role="content">
            <div class="big-text">Your login name is <b><span id="username-position"></span></b></div>
            <div class="big-text">Your id is <b><span id="id-position"></span></b></div>
        </div>
        <script src="assets/js/index_script.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/loginScript.js"></script>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>