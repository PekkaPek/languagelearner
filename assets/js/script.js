/**
 * Created by pekka on 11/05/16.
 */
$(document).on('pagecreate', function () {

    var usernameInput;
    var passwordInput;

    $('#login-btn').click(function (e) {
        e.preventDefault();
        usernameInput = $('#login-username').val();
        passwordInput = $('#login-password').val();
        $.ajax( {
            url: 'login_action.php',
            type: 'POST',
            data: { username: usernameInput, password:  passwordInput },
            success: function (login_successful) {
                if(login_successful === 'login successful') {
                    $('#login-error').show().hide();
                    $.mobile.changePage("index.php", {transition: "slideup"});
                } else {
                    $('#account-created').hide();
                    $('#login-error').show();
                }
            }
        });
    });

    $('#new-account-btn').click(function (e) {
        e.preventDefault();
        $.ajax( {
            url: 'new_account.php',
            type: 'POST',
            data: { newUsername: $('#new-username').val(), newPassword: $('#new-password').val() },
            success: function () {
                $('#sign-in').popup('close');
                $('#login-error').hide();
                $('#account-created').show();
            }
        });
    });

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
                $.mobile.changePage("index.php", {transition: "slideup"});
            }
        });
    });

    var nextQuestionProgressBarPercentage = 0;
    var timeBetweenImages = getTimeBetweenImages();
    var answerTimes = 0;

    var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'assets/audio/twang.mp3');

    $(document).off('click', '#answer-btn').on('click', "#answer-btn", function (e) {
        // prevent submitting the form
        e.preventDefault();
        // check user's answer using ajax
        $.ajax( {
            url: 'check_answer.php',
            success: function(right_answer) {
                timeBetweenImages.done( function () {
                    // Remove active active state of btn
                    $("#answer-btn").parent().removeClass('ui-btn-active');
                    /*** Right answer ***/
                    if (right_answer == $('#answer-txt').val()) {
                        audioElement.play();
                        // frontend changes
                        printAnswer();
                        $("#wrong-answer-first-time").show().hide();
                        $('#right-answer').show();
                        // backend change
                        addOneToTries();
                        addOneToCorrectAnswers();
                        // start progress bar
                        resetCounterBar();
                        setTimeout(setInterval(incrementCounterBarByOne, 40), 400);
                        // change to next question
                        changeToNextQuestion();
                        /*** Wrong answer first time ***/
                    } else if (answerTimes < 1) {
                        // counting answer times
                        answerTimes++;
                        // frontend change
                        $('#wrong-answer-first-time').show();
                        /*** Wrong answer second time ***/
                    } else {
                        // frontend changes
                        printAnswer();
                        $('#wrong-answer-first-time').hide();
                        $('#wrong-answer-second-time').show();
                        // backend change
                        addOneToTries();
                        // start progress bar
                        timeBetweenImages = getTimeBetweenImages();
                        resetCounterBar();
                        setInterval(incrementCounterBarByOne, 40);
                        // change to next question
                        changeToNextQuestion();
                    }
                });
            }
        });
    });
              
    function addOneToTries() {
        $.ajax( {
           url: 'addOneToTries.php',
            success: function () {
            }
        });        
    }
    
    function addOneToCorrectAnswers() {
        $.ajax( {
           url: 'addOneToCorrectAnswers.php',
            success: function() {
            }
        });
    }
    
    function incrementCounterBarByOne() {
        if (nextQuestionProgressBarPercentage <= 100) {
            // add the progress bar value by one
            nextQuestionProgressBarPercentage++;
          $('.counter').val( nextQuestionProgressBarPercentage );
        }
    }
    
    function resetCounterBar() {
        nextQuestionProgressBarPercentage = 0;
        $('.counter').val(0);
    }

    function changeToNextQuestion() {
        setTimeout( function () {
            $.ajax( {
               url: 'printRandomPicture.php',
                success: function (picture_element) {
                    $('#question-img-container').html(picture_element);
                    $('html, body').animate({ scrollTop: 0 }, 0);
                    $('#answer-txt').val('');
                    answerTimes = 0;
                    $("#wrong-answer-second-time").hide();
                    $("#right-answer").hide();
                }
            });

        }, 4000);
    }

    function getTimeBetweenImages() {
        return $.ajax( {
           url: 'get_time_between_images.php'
            });
    }

    function printAnswer() {
        $.ajax( {
           url: 'get_answer.php',
            success: function (answer) {
                  $('.answer').html(answer);
            }
        });
    }
    
});

$(document).off("swipe", "#statistics").on("swipe", "#statistics", changeStatistics);
$(document).off("swipe", "#statistics-user").on("swipe", "#statistics-user" ,changeStatistics);

$(document).on("taphold", '.question-img', function () {
    $(this).hide(1000).show(1000);
});

function changeStatistics() {
    if ($.mobile.activePage.attr('id') == 'statistics') {
        $.mobile.changePage("#statistics-user", {transition: "slideup"});
    } else {
        $.mobile.changePage("#statistics", {transition: "slideup"});
    }
}

$(window).on("orientationchange", function (e) {
    if(e.orientation === 'portrait') {
            $.mobile.changePage("#question", {transition: "slideup"});
    } else {
            showQuestionStatistics();
            getUserName();
            getUserId();
            $.mobile.changePage("#statistics", {transition: "slideup"});
    }
});






function showQuestionStatistics() {
    $.ajax( {
       url: 'statistics.php',
        success: function (statistics) {
            $('#statistics-box').html(statistics);
        }
    });
}

function getUserName() {
    $.ajax( {
       url: 'get_loggedInUser.php',
        success: function (name) {
            $('#username-position').html(name);
        }
    });
}

function getUserId() {
    $.ajax({
        url: 'get_loggedInId.php',
        success: function (id) {
            $('#id-position').html(id);
        }
    });
}

