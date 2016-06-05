<?php include('check_session.php'); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
    <!-- indexin head -->
</head>
<body>

    <!--- Languages page -->
    <!---                -->
    <div data-role="page" id="languages-page">

        <!-- header -->
        <div data-role="header">
            <a href="settings.php" class="ui-btn ui-shadow ui-corner-all ui-icon-gear ui-btn-icon-notext">Keijo</a>
            <h1>Language learner</h1>
            <a href="logout.php" class="ui-btn">Log out</a>
        </div>

        <!-- content -->
        <div data-role="content">
            <?php include('messages.php'); ?>
            <h2>Start learning a language</h2>
            <a href="learn.php" data-role="button" data-transition="slide">English</a>
            <a href="learn.php" data-role="button">Dutch</a>
            <a href="learn.php" data-role="button">Finnish</a>
        </div>

        <!-- footer -->
        <?php include('footer.html'); ?>
    </div> <!-- Languages page ends -->



</body>
</html>