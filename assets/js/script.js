/**
 * Created by pekka on 11/05/16.
 */
$(document).ready(function () {

    var nextQuestionProgressBarPercentage = 0;
    var timeBetweenImages = getTimeBetweenImages();
    var answerTimes = 0;

    $("#answer_btn").click(function (e) {
        // prevent submitting the form
        e.preventDefault();
        // check user's answer using ajax
        $.ajax( {
            url: 'check_answer.php',
            success: function(right_answer) {
                timeBetweenImages.done( function () {
                    /*** Right answer ***/
                    if (right_answer == $('#answer-txt').val()) {
                        // frontend changes
                        $("#wrong-answer-first-time").show().hide();
                        $('#right-answer').show();
                        // backend change
                        addOneToTries();
                        addOneToCorrectAnswers();
                        // start progress bar
                        setInterval(incrementCounterBarByOne, 40);
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
                        $('#wrong-answer-first-time').hide();
                        $('#wrong-answer-second-time').show();
                        // backend change
                        addOneToTries();
                        // start progress bar
                        timeBetweenImages = getTimeBetweenImages();
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

    function changeToNextQuestion() {
        setTimeout( function () {
            window.location.replace(window.location.href);
        }, 4000);
    }

    function getTimeBetweenImages() {
        return $.ajax( {
           url: 'get_time_between_images.php'
            });
    }

    /*$("#statistics").on("swipe", changeStatistics);
    $("#statistics-user").on("swipe", changeStatistics);

    function changeStatistics() {
        console.log('Swipe detected');
        if ($.mobile.activePage.attr('id') == 'statistics') {
            console.log("changing to statistics-user page");
            $.mobile.changePage("#statistics-user", {transition: "slideup"});
        } else {
            console.log("changing to statistics page");
            $.mobile.changePage("#statistics", {transition: "slideup"});
        }
    } */

});

$("#statistics").on("swipe", changeStatistics);
$("#statistics-user").on("swipe", changeStatistics);

function changeStatistics() {
    console.log('Swipe detected');
    if ($.mobile.activePage.attr('id') == 'statistics') {
        console.log("changing to statistics-user page");
        $.mobile.changePage("#statistics-user", {transition: "slideup"});
    } else {
        console.log("changing to statistics page");
        $.mobile.changePage("#statistics", {transition: "slideup"});
    }
}

$(window).on("orientationchange", function (e) {
    if(e.orientation === 'portrait') {
            $.mobile.changePage("#question", {transition: "slideup"});
    } else {
            showStatistics();
            $.mobile.changePage("#statistics", {transition: "slideup"});
    }
});


function showStatistics() {
    $.ajax( {
       url: 'statistics.php',
        success: function (statistics) {
            $('#statistics-box').html(statistics);
        }
    });
}

