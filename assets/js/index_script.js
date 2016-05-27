$(document).ready( function () {

    var audio_setting;
    var seconds_between_images;

    $("#settings-save").click( function (e) {
        seconds_between_images = $('#seconds-between-images-slider').val();
        audio_setting = $('#audio-setting-radiobutton-group :radio:checked').val();
        $.ajax( {
            url: 'save_settings.php',
            type: 'post',
            data: { seconds_between_images: seconds_between_images, audio_setting: audio_setting},
            success: function () {
            }
        });
        window.location = 'index.php?status=3';
    });

});