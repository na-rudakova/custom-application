jQuery(document).ready(function($) {
    $('#application-form').submit(function() {
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: custom_application_vars.rest_url,
            data: formData,
            success: function(response) {
                $('#application-result').html(response);
            }
        });
        return false;
    });
});