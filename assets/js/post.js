/*
File: style-footer.css
Created by: Evandro Ramos
Date: February 23, 2018
Last modified: March 19, 2018 by Evandro Ramos
*/
$(function () {

    var request;
    $('#loginForm').submit(function(event) {
         // Prevent default posting of form
        event.preventDefault();

        // Abort any pending request
        if (request) {
            request.abort();
        }



        // Setup some local variables
        var form = $(this);
        // Serialize the data in the form
        var serializedData = form.serialize();

        // Let's select and cache all the fields - ("input, select, button, textarea")
        var inputs = form.find('input, button');

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        inputs.prop('disabled', true);

        // //Start the loading gif
        // $('#sing_in_text').hide();
        // $('#loading_animation').show();

        request = $.ajax({
            method: 'POST',
            url: 'assets/class/control/user_login.php',
            data: serializedData
        });

        request.done(function(result) {
            if (result == "1") {
                window.location = '/professor.php';
            } else if (result == "2") {
                window.location = '/student.php';
            } else if(result == "0"){
                window.location = '/admin.php';
            }else{
                showError(result);
            }
        });

        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            // showError('ERROR - ' + errorThrown);
            showError('Database is not online');
        });
9;
        request.always(function () {
            // Reenable the inputs
            inputs.prop('disabled', false);
        });
    });

    function showError(data) {
        $("#login-feedback").html(data);
        $('#myModal').modal('show');
    }



});

