<?php
if (session_status() === PHP_SESSION_NONE){session_start();}
include('check_session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php'); ?>
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
            <span id="question-img-container"><?php include_once('printRandomPicture.php')?></span>
            <form id="answer-form">
                What is this?
                <input type="text" name="answer" id="answer-txt" autocomplete="off" >
                <input type="submit" value="Answer" id="answer-btn">
            </form>

            <!-- Wrong answers-->
            <div id="wrong-answer-first-time">
                Wrong answer.<br><br>
                Try once more.
            </div>

            <div id="wrong-answer-second-time">
                Wrong answer<br><br>
                Right answer: <span class="answer"></span><br><br>
                Next question<br>
                <progress value="0" max="100" class="counter"></progress>
            </div>

            <!-- Right answer -->
            <div id="right-answer">
                Right answer: <span class="answer"></span><br><br>
                Next question<br>
                <progress value="0" max="100" class="counter"></progress>
            </div>
        </div>

        <!-- Footer -->
        <?php include('footer.html'); ?>
    </div>

    <div data-role="page" id="statistics">
        <div data-role="content">
            Right answers / Total questions
            <div id="statistics-box"></div>
            <br><br>Swipe to see user info
        </div>
    </div>

    <div data-role="page" id="statistics-user">
        <div data-role="content">
            <div class="big-text">Your login name is <b><span id="username-position"></span></b></div>
            <div class="big-text">Your id is <b><span id="id-position"></span></b></div>
        </div>
    </div>

</body>
</html>