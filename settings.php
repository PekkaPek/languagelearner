<?php include('check_session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
</head>
<body>

<!-- Settings page -->
<!--               -->
<div data-role="page" id="settings-page">

    <!-- header -->
    <div data-role="header">
        <a href="index.php" class="ui-btn ui-corner-all">Menu</a>
        <h1>Language learner - Settings</h1>
        <a href="logout.php" class="ui-btn">Logout</a>
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
        <a href="index.php"><button>Cancel</button></a>
    </div>

    <!-- footer -->
    <?php include('footer.html'); ?>
</div><!-- Settings page ends -->

</body>
</html>