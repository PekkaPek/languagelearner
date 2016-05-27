/**
 * Created by pekka on 18/05/16.
 */

$(document).ready( function () {

    var usernameInput;
    var passwordInput;

    $('#login-btn').click(function (e) {
        e.preventDefault();
        usernameInput = $('#login-username').val();
        console.log('Login script says: ' + usernameInput);
        passwordInput = $('#login-password').val();
        $.ajax( {
            url: 'login_action.php',
            type: 'POST',
            data: { username: usernameInput, password:  passwordInput },
            success: function (login_successful) {
                console.log(login_successful);
                if(login_successful === 'login successful') {
                    $('#login-error').show().hide();
                    window.location.replace('index.php');
                } else {
                        $('#login-error').show();
                }
            }
        });
    });

    $('#new-account-btn').click(function (e) {
        e.preventDefault();
        console.log($('#new-username').val());
        console.log($('#new-password').val());
        $.ajax( {
           url: 'new_account.php',
            type: 'POST',
            data: { newUsername: $('#new-username').val(), newPassword: $('#new-password').val() },
            success: function () {
                $('#sign-in').popup('close');
                $('#account-created').show();
            }
        });
    });
});