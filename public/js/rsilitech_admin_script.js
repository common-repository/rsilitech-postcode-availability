/* --------------- admin settings page details-----*/
jQuery(document).ready(function($) {
    $('#rspa_postcode_unavailable_message').on('keyup', function() {
        $('#check_availability_service_unavailable').text($(this).val());
    });
    $('#rspa_postcode_placeholder_text').on('keyup', function() {
        $('#rspa_postcode_placeholder').attr('placeholder', $(this).val());
    });

    $('#rspa_postcode_check_availability_text').on('keyup', function() {
        $('#check_availability_title').text($(this).val());
    });



    $('#rspa_frontend_check_button_background_color_chooser').on('change', function() {
        $('#validate_postcode').css('background-color', jQuery(this).val());
        $('#rspa_frontend_check_button_background_color').val(jQuery(this).val());
    });

    $('#rspa_frontend_check_button_background_color').on('keyup', function() {
        $('#validate_postcode').css('background-color', jQuery(this).val());

    });

    $('#rspa_frontend_check_button_text_color_chooser').on('change', function() {
        $('#validate_postcode').css('color', jQuery(this).val());
        $('#rspa_frontend_check_button_text_color').val(jQuery(this).val());
    });

    $('#rspa_frontend_check_button_text_color').on('keyup', function() {
        $('#validate_postcode').css('color', jQuery(this).val());
    });

    $('#rspa_frontend_check_button_border_color_chooser').on('change', function() {
        $('#validate_postcode').css('border-color', jQuery(this).val());
        $('#rspa_frontend_check_button_border_color').val(jQuery(this).val());
    });

    $('#rspa_frontend_check_button_border_color').on('keyup', function() {
        $('#validate_postcode').css('border-color', jQuery(this).val());
    });
    $('#rspa_postcode_check_button_text').on('keyup', function() {
        $('#validate_postcode').text(jQuery(this).val());
    });

    $('#rspa_frontend_padding_top, #rspa_frontend_padding_right, #rspa_frontend_padding_bottom, #rspa_frontend_padding_left').on('keyup', function() {
        var padding_top = $('#rspa_frontend_padding_top').val();
        var padding_right = $('#rspa_frontend_padding_right').val();
        var padding_bottom = $('#rspa_frontend_padding_bottom').val();
        var padding_left = $('#rspa_frontend_padding_left').val();

        $('#check_avilability_output').attr('style',
            'padding-top :' + padding_top + 'px;' +
            'padding-right:' + padding_right + 'px;' +
            'padding-bottom:' + padding_bottom + 'px;' +
            'padding-left:' + padding_left + 'px;'
        );

    });

    $('#rspa_postcode_service_available_in').on('keyup', function() {
        $('#service_available_in').text(jQuery(this).val());
    });
    $('#rspa_postcode_delevered_by').on('keyup', function() {
        $('#deleverd_by').text(jQuery(this).val());
    });
    $('#rspa_postcode_cod_available').on('keyup', function() {
        $('#cod_aviabale').text(jQuery(this).val());
    });
    $('#rspa_postcode_shipping_details').on('keyup', function() {
        $('#shipping_details').text(jQuery(this).val());
    });

});