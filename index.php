<?php include('check_session.php'); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Learner </title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="assets/js/index_script.js"></script>
</head>
<body>

    <!--- Languages page -->
    <!---                -->
    <div data-role="page" id="languages-page">

        <!-- header -->
        <div data-role="header">
            <a href="#settings-page" data-icon="gear">Settings</a>
            <h1>Language learner</h1>
            <a href="logout.php" data-icon="power" class="ui-btn-right">Logout <?php echo $_SESSION['loggedInUser']; ?></a>
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
        <div data-role="footer" data-position="fixed">
            testfooter
        </div>
    </div> <!-- Languages page ends -->

    <!-- Settings page -->
    <!--               -->
    <div data-role="page" id="settings-page">

        <!-- header -->
        <div data-role="header">
            <a href="#languages-page" data-icon="home">Menu</a>
            <h1>Language learner - Settings</h1>
            <a href="logout.php" data-icon="power" class="ui-btn-right">Logout <?php echo $_SESSION['loggedInUser']; ?></a>
        </div>

        <!-- content -->
        <div data-role="content">
                <label for="seconds-between-images-slider">Time Between Images</label>
                <input type="range" name="seconds-between-images-slider" id="seconds-between-images-slider" value="<?php include('get_time_between_images.php') ?>" min="0" max="10" data-highlight="true" />
            <fieldset data-role="controlgroup" id="audio-setting-radiobutton-group">
                <legend>Play Audio Example</legend>
                <?php include('get_audio_on.php'); // stored value: $play_audio_example?>
                <input type="radio" name="audio-play-setting" id="audio-on-radio-btn" value="on" <?php echo ($play_audio_example === '1') ? "checked=\"true\"" : ""; ?>  />
                <label for="audio-on-radio-btn">On</label>
                <input type="radio" name="audio-play-setting" id="audio-off-radio-btn" value="off" <?php echo ($play_audio_example === '0') ? "checked=\"true\"" : ""; ?> />
                <label for="audio-off-radio-btn">Off</label>
            </fieldset>
            <button id="settings-save">Save</button>
            <button id="settings-cancel">Cancel</button>
        </div>

        <!-- footer -->
        <div data-role="footer" data-position="fixed">
            testfooter
        </div>

    </div><!-- Settings page ends -->

</body>
</html>