$(document).ready(function() {

    var request;

    $('#add_form').submit(function(event) {
         // Prevent default posting of form
        event.preventDefault();

        // Abort any pending request
        if (request) {
            request.abort();
        }

        // Setup some local variables
        var form = $(this);

        // Let's select and cache all the fields - ("input, select, button, textarea")
        var inputs = form.find('input');

        // Serialize the data in the form
        var serializedData = form.serialize();

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        inputs.prop('disabled', true);

        request = $.ajax({
            method: 'POST',
            url: '_control/user_add',
            data: serializedData
        });

        request.done(function(data) {
            showError(data);
        });

        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            showError('ERROR - ' + errorThrown);
        });

        request.always(function () {
            // Reenable the inputs
            inputs.prop('disabled', false);
        });
    });

    $('#login_form').submit(function(event) {
         // Prevent default posting of form
        event.preventDefault();

        // Let's select and cache all the fields - ("input, select, button, textarea")
        var inputs = form.find('input');

        // Abort any pending request
        if (request) {
            request.abort();
        }

        // Setup some local variables
        var form = $(this);
        // Serialize the data in the form
        var serializedData = form.serialize();

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        inputs.prop('disabled', true);

        //Start the loading gif
        $('#sing_in_text').hide();
        $('#loading_animation').show();

        request = $.ajax({
            method: 'POST',
            url: '_control/user_login',
            data: serializedData
        });

        request.done(function(data) {
            if (data == "1") {
                window.location = '/home';
            } else {
                showError(data);
            }
        });

        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            showError('ERROR - ' + errorThrown);
        });
9
        request.always(function () {
            // Reenable the inputs
            inputs.prop('disabled', false);

            $('#sing_in_text').show();
            $('#loading_animation').hide();
        });
    });

    function showError(data) {
        var box =  $('#error');
        var text = $('#error_text');

        box.hide().finish();
        text.empty().append(data);
        box.delay(100).fadeIn(250).delay(2500).fadeOut();
        document.getElementById("error-section").scrollIntoView();
    }

});

