/**
 * Pinpointe Plugin Frontend JavaScript
 */
jQuery(document).ready(function() {

    /**
     * Display hidden interest groups (if any)
     */
    jQuery('.pinpointe_signup_form fieldset').click(function() {
        jQuery(this).find('.pinpointe_interest_groups_hidden').show();
        var form = jQuery(this).closest('.pinpointe_signup_form');
        if (form.hasClass('sky-form-modal')) {
            form.css('top', '50%').css('left', '50%').css('margin-top', -form.outerHeight()/2).css('margin-left', -form.outerWidth()/2);
        }
    });

    /**
     * Handle form submit
     */
    jQuery('.pinpointe_signup_form').each(function() {

        var pinpointe_button = jQuery(this).find('button');
        var pinpointe_context = jQuery(this).find('#pinpointe_form_context').val();

        pinpointe_button.click(function() {
            pinpointe_process_signup(jQuery(this), pinpointe_context);
        });

        jQuery(this).find('input[type="text"], input[type="email"]').each(function() {
            jQuery(this).keydown(function(e) {
                if (e.keyCode === 13) {
                    pinpointe_process_signup(pinpointe_button, pinpointe_context);
                }
            });
        });
    });

    function pinpointe_process_botbust(form)
    {
        if (form.find('#addressStarfall').length < 1 || form.find('#addressStarfall').val() != 'Please replace') {
            return false;
        }

        if (form.find('#contactStarfall').length < 1 || form.find('#contactStarfall').val() != '') {
            return false;
        }

        if (form.find('#commentStarfall').length < 1 || form.find('#commentStarfall').val() != '') {
            return false;
        }

        if (form.find('#timerStarfall').length < 1 || form.find('#timerStarfall').val() < 2) {
            return false;
        }

        return true;
    }

    /**
     * Pinpointe signup
     */
    function pinpointe_process_signup(button, context)
    {
        if (button.closest('.pinpointe_signup_form').valid()) {

            button.closest('.pinpointe_signup_form').find('fieldset').fadeOut(function() {
                var  this_form = jQuery(this).closest('.pinpointe_signup_form');
                var passBots = pinpointe_process_botbust(button.closest('.pinpointe_signup_form'));

                if (!passBots)
                {
                    this_form.find('#pinpointe_signup_'+context+'_success').children().html('Thank you for subscribing!');
                    this_form.find('#pinpointe_signup_'+context+'_success').fadeIn();
                    return;
                }

                this_form.find('#pinpointe_signup_'+context+'_processing').fadeIn();
                button.prop('disabled', true);

                if (this_form.hasClass('sky-form-modal')) {
                    this_form.css('top', '50%').css('left', '50%').css('margin-top', -this_form.outerHeight()/2).css('margin-left', -this_form.outerWidth()/2);
                }

                jQuery.post(
                    pinpointe_ajaxurl,
                    {
                        'action': 'pinpointe_subscribe',
                        'data': button.closest('.pinpointe_signup_form').serialize()
                    },
                    function(response) {
                        var result = jQuery.parseJSON(response);

                        // Remove progress scene
                        this_form.find('#pinpointe_signup_'+context+'_processing').fadeOut(function() {
                            if (result['error'] == 1) {
                                this_form.find('#pinpointe_signup_'+context+'_error').children().html(result['message']);
                                this_form.find('#pinpointe_signup_'+context+'_error').fadeIn();
                            }
                            else {
                                this_form.find('#pinpointe_signup_'+context+'_success').children().html(result['message']);
                                this_form.find('#pinpointe_signup_'+context+'_success').fadeIn();

                                var date = new Date();
                                date.setTime(date.getTime() + (5 * 365 * 24 * 60 * 60 * 1000));
                                jQuery.cookie('pinpointe_s', '1', { expires: date, path: '/' });

                                if (context == 'lock') {
                                    setTimeout(function() {
                                        location.reload();
                                    }, 2000);
                                }
                                else if (typeof result['redirect_url'] !== 'undefined' && result['redirect_url']) {
                                    setTimeout(function() {
                                        location.replace(result['redirect_url']);
                                    }, 1000);
                                }
                            }

                            if (this_form.hasClass('sky-form-modal')) {
                                this_form.css('top', '50%').css('left', '50%').css('margin-top', -this_form.outerHeight()/2).css('margin-left', -this_form.outerWidth()/2);
                            }
                        });
                    }
                );
            });
        }
    }

});
