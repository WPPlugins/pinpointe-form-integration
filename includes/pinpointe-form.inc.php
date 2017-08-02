<?php
/**
 * Renders signup form
 * 
 * @return void
 */
if (!function_exists('pinpointe_form')) {
    function pinpointe_form($allowed_forms = array())
    {
        $opt = get_option('pinpointe_options', $results);

        // Check if integration is enabled
        if (!$opt || !is_array($opt) || empty($opt) || !isset($opt['pinpointe_api_key']) || !$opt['pinpointe_api_key']) {
            return;
        }

        // Check if at least one form is defined
        if (!isset($opt['forms']) || empty($opt['forms'])) {
            return;
        }

        $form = PinpointeSignupForm::select_form_by_conditions($opt['forms'], $allowed_forms);

        require_once PINPOINTE_PLUGIN_PATH . '/includes/pinpointe-prepare-form.inc.php';

        $html = pinpointe_prepare_form($form, $opt, 'shortcode');

        echo $html;
    }
}

?>