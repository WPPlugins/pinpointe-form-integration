<?php

/*
 * Returns configuration for this plugin
 *
 * @return array
 */
if (!function_exists('pinpointe_plugin_settings')) {
    function pinpointe_plugin_settings()
    {
        $settings = array(
            'pinpointe' => array(
                'title' => __('Pinpointe', 'pinpointe'),
                'page_title' => __('Pinpointe', 'pinpointe'),
                'capability' => 'manage_options',
                'slug' => 'pinpointe',
                'children' => array(
                    'settings' => array(
                        'title' => __('Settings', 'pinpointe'),
                        'icon' => '<i class="fa fa-cogs" style="font-size: 0.8em;"></i>',
                        'children' => array(
                            'integration' => array(
                                'title' => __('Integration', 'pinpointe'),
                                'children' => array(
                                    'api_url' => array(
                                        'title' => __('Pinpointe API URL', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => '',
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true,
                                        ),
                                        'hint' => __('<p>Enter the URL to the Pinpointe XML API that was provided to you.</p>', 'pinpointe'),
                                    ),

                                    'username' => array(
                                        'title' => __('Pinpointe Username', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => '',
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true,
                                        ),
                                        'hint' => __('<p>Enter your Pinpointe username.</p>', 'pinpointe'),
                                    ),

                                    'api_key' => array(
                                        'title' => __('Pinpointe API key', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => '',
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true,
                                        ),
                                        'hint' => __('<p>API key is required for this plugin to communicate with the Pinpointe servers.</p> <p>To get an API key, send an email to <a href=\'mailto:support@pinpointe.com\'>support@pinpointe.com</a>.</p>', 'pinpointe'),
                                    ),
                                ),
                            ),
                            'general_settings' => array(
                                'title' => __('General Settings', 'pinpointe'),
                                'children' => array(
                                    /*'double_optin' => array(
                                        'title' => __('Require double opt-in', 'pinpointe'),
                                        'type' => 'checkbox',
                                        'default' => 1,
                                        'validation' => array(
                                            'rule' => 'bool',
                                            'empty' => false
                                        ),
                                        'hint' => __('<p>Controls whether a double opt-in confirmation message is sent before user is actually subscribed.</p>', 'pinpointe'),
                                    ),
                                    'send_welcome' => array(
                                        'title' => __('Send welcome email', 'pinpointe'),
                                        'type' => 'checkbox',
                                        'default' => 1,
                                        'validation' => array(
                                            'rule' => 'bool',
                                            'empty' => false
                                        ),
                                        'hint' => __('<p>If double opt-in is disabled and this setting is enabled, MailChimp will send your lists Welcome Email on user subscription. This has no effect if double opt-in is enabled.</p>', 'pinpointe'),
                                    ),
                                    'replace_groups' => array(
                                        'title' => __('Replace interest groups on update', 'pinpointe'),
                                        'type' => 'checkbox',
                                        'default' => 0,
                                        'validation' => array(
                                            'rule' => 'bool',
                                            'empty' => false
                                        ),
                                        'hint' => __('<p>Setting is used by MailChimp to determine whether interest groups are added to a set of existing interest groups of particular user or they are completely replaced with new interest groups. This is applicable when user is already subscribed to the list and profile is being updated.</p>', 'pinpointe'),
                                    ),*/
                                    'add_to_autoresponders' => array(
                                        'title' => __('Add to autoresponders', 'pinpointe'),
                                        'type' => 'checkbox',
                                        'default' => 0,
                                        'validation' => array(
                                            'rule' => 'bool',
                                            'empty' => false
                                        ),
                                        'hint' => __('<p>Control whether newly subscribed members will be added to autoresponders.</p>', 'pinpointe'),
                                    ),
                                    'update_existing' => array(
                                        'title' => __('Update existing subscribers', 'pinpointe'),
                                        'type' => 'checkbox',
                                        'default' => 1,
                                        'validation' => array(
                                            'rule' => 'bool',
                                            'empty' => false
                                        ),
                                        'hint' => __('<p>Control whether existing subscribers are updated when they fill out the signup form again or error is displayed. This has no effect for Sync functionality.</p>', 'pinpointe'),
                                    ),
                                ),
                            ),
                            'settings_styling' => array(
                                'title' => __('Form Styling', 'pinpointe'),
                                'children' => array(
                                    'labels_inline' => array(
                                        'title' => __('Display field labels inline', 'pinpointe'),
                                        'type' => 'checkbox',
                                        'default' => 1,
                                        'validation' => array(
                                            'rule' => 'bool',
                                            'empty' => false
                                        ),
                                        'hint' => __('<p>Controls whether signup form field labels are displayed inside fields as value placeholders (inline) or above fields.</p>', 'pinpointe'),
                                    ),
                                    /*'groups_hidden' => array(
                                        'title' => __('Hide interest groups initially', 'pinpointe'),
                                        'type' => 'checkbox',
                                        'default' => 0,
                                        'validation' => array(
                                            'rule' => 'bool',
                                            'empty' => false
                                        ),
                                        'hint' => __('<p>Interest groups can take significant amount of space. If this option is enabled, interest group fields will be hidden until user starts filling in the form (clicks anywhere on the form).</p>', 'pinpointe'),
                                    ),*/
                                    'width_limit' => array(
                                        'title' => __('Max form width in pixels', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => '',
                                        'validation' => array(
                                            'rule' => 'number',
                                            'empty' => true,
                                        ),
                                        'hint' => __('<p>If your website features a wide layout, you may wish to set the max width for the form to look better. This has no effect for forms displayed as popup.</p>', 'pinpointe'),
                                    ),
                                    'css_override' => array(
                                        'title' => __('Override CSS', 'pinpointe'),
                                        'type' => 'textarea',
                                        'default' => '.pinpointe_custom_css {}',
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                        'hint' => __('<p>You can further customize the appearance of your signup forms by adding custom CSS to this field. To make changes to the style, simply use CSS class pinpointe_custom_css as a basis.</p>', 'pinpointe'),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'forms' => array(
                        'title' => __('Forms', 'pinpointe'),
                        'icon' => '<i class="fa fa-edit" style="font-size: 0.8em;"></i>',
                        'children' => array(
                            'forms' => array(
                                'title' => __('Manage Signup Forms', 'pinpointe'),
                                'children' => array(
                                ),
                            ),
                        ),
                    ),
                    'popup' => array(
                        'title' => __('Popup', 'pinpointe'),
                        'icon' => '<i class="fa fa-comment" style="font-size: 0.8em;"></i>',
                        'children' => array(
                            'popup_general_settings' => array(
                                'title' => __('Display Popup', 'pinpointe'),
                                'children' => array(
                                    'popup_enabled' => array(
                                        'title' => __('Enable popup', 'pinpointe'),
                                        'type' => 'checkbox',
                                        'default' => 0,
                                        'validation' => array(
                                            'rule' => 'bool',
                                            'empty' => false
                                        ),
                                        'hint' => __('<p>Displays popup with mailing list signup form as configured. You can use form conditions for more granual control.</p>', 'pinpointe'),
                                    ),
                                    'popup_form' => array(
                                        'title' => __('Form to display', 'pinpointe'),
                                        'type' => 'dropdown',
                                        'default' => 0,
                                        'validation' => array(
                                            'rule' => 'option',
                                            'empty' => true
                                        ),
                                        'values' => PinpointeSignupForm::get_list_of_forms(),
                                        'hint' => __('<p>Select one of the forms created under tab Forms to display as a popup.</p>', 'pinpointe'),
                                    ),
                                    'popup_delay' => array(
                                        'title' => __('Open delay in seconds', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => '5',
                                        'validation' => array(
                                            'rule' => 'number',
                                            'empty' => true,
                                        ),
                                        'hint' => __('<p>If set, form will be opened after a specified number of seconds counting from the complete page load.</p>', 'pinpointe'),
                                    ),
                                    'popup_display_on' => array(
                                        'title' => __('Display in', 'pinpointe'),
                                        'type' => 'checkbox_set',
                                        'default' => array('1'),
                                        'validation' => array(
                                            'rule' => 'multiple_any',
                                            'empty' => true
                                        ),
                                        'values' => array(
                                            '1' => __('Home page', 'pinpointe'),
                                            '2' => __('Pages', 'pinpointe'),
                                            '3' => __('Posts', 'pinpointe'),
                                            '4' => __('Everywhere else', 'pinpointe'),
                                        ),
                                        'hint' => __('<p>Page types where you want the popup to be fired.</p>', 'pinpointe'),
                                    ),
                                ),
                            ),
                            'popup_frequency' => array(
                                'title' => __('Frequency Capping', 'pinpointe'),
                                'children' => array(
                                    'popup_page_limit' => array(
                                        'title' => __('Page frequency', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => '1',
                                        'validation' => array(
                                            'rule' => 'number',
                                            'empty' => true,
                                        ),
                                        'hint' => __('<p>Popup will be displayed once in every X pages opened. Leaving blank or setting value to 1 will have the same effect.</p>', 'pinpointe'),
                                    ),
                                    'popup_time_limit' => array(
                                        'title' => __('Time frequency in minutes', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => '5',
                                        'validation' => array(
                                            'rule' => 'number',
                                            'empty' => true,
                                        ),
                                        'hint' => __('<p>Popup will be displayed once in every X minutes.</p>', 'pinpointe'),
                                    ),
                                    'popup_allow_dismissing' => array(
                                        'title' => __('Allow dismissing', 'pinpointe'),
                                        'type' => 'checkbox',
                                        'default' => 1,
                                        'validation' => array(
                                            'rule' => 'bool',
                                            'empty' => false
                                        ),
                                        'hint' => __('<p>If enabled, users will be provided with an option (a link to click) to hide the popup forever without filling in the form.</p>', 'pinpointe'),
                                    ),
                                    'label_dismiss_popup' => array(
                                        'title' => __('Dismiss link text', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => __('Never display this again', 'pinpointe'),
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                        'hint' => __('<p>If popup dismissing is enabled, this will be the text of the dismiss link.</p>', 'pinpointe'),
                                    ),
                                ),
                            ),
                         ),
                    ),
                    'below' => array(
                        'title' => __('Form Display', 'pinpointe'),
                        'icon' => '<i class="fa fa-file-text" style="font-size: 0.8em;"></i>',
                        'children' => array(
                            'below_settings' => array(
                                'title' => __('Display Below Every Post', 'pinpointe'),
                                'children' => array(
                                    'after_posts_post_types' => array(
                                        'title' => __('Display signup form below', 'pinpointe'),
                                        'type' => 'checkbox_set',
                                        'default' => array(),
                                        'validation' => array(
                                            'rule' => 'multiple_any',
                                            'empty' => true
                                        ),
                                        'values' => array(
                                            '1' => __('Posts', 'pinpointe'),
                                            '2' => __('Pages', 'pinpointe'),
                                        ),
                                        'hint' => __('<p>Page types where you want the form to be displayed below the main content. You can use form conditions for more granular control.</p>', 'pinpointe'),
                                    ),
                                    'after_posts_allowed_forms' => array(
                                        'title' => __('Allow only these forms', 'pinpointe'),
                                        'type' => 'dropdown_multi',
                                        'default' => array(),
                                        'validation' => array(
                                            'rule' => 'multiple_any',
                                            'empty' => true
                                        ),
                                        'values' => PinpointeSignupForm::get_list_of_forms(false),
                                        'hint' => __('<p>If a list of form IDs are specified, only those forms will be eligible to be displayed. The forms will be filtered based on their display conditions, then the first remaining form will be displayed.</p>', 'pinpointe'),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'lock' => array(
                        'title' => __('Locking', 'pinpointe'),
                        'icon' => '<i class="fa fa-lock" style="font-size: 0.8em;"></i>',
                        'children' => array(
                            'lock_general_settings' => array(
                                'title' => __('Subscribe To Unlock', 'pinpointe'),
                                'children' => array(
                                    'lock_enabled' => array(
                                        'title' => __('Enable content locking', 'pinpointe'),
                                        'type' => 'checkbox',
                                        'default' => 0,
                                        'validation' => array(
                                            'rule' => 'bool',
                                            'empty' => false
                                        ),
                                        'hint' => __('<p>If enabled, posts or pages that match form display conditions will be locked. Only subscribers will be able to access that content. This functionality uses cookies for tracking. If subscriber clears browser cookies, content will be locked again.</p> <p>Use form conditions to control which pages will be locked.</p>', 'pinpointe'),
                                    ),
                                    'lock_form' => array(
                                        'title' => __('Form to display', 'pinpointe'),
                                        'type' => 'dropdown',
                                        'default' => 0,
                                        'validation' => array(
                                            'rule' => 'option',
                                            'empty' => true
                                        ),
                                        'values' => PinpointeSignupForm::get_list_of_forms(),
                                        'hint' => __('<p>Select one of the forms created under tab Forms to display instead of locked content.</p>', 'pinpointe'),
                                    ),
                                    'lock_title' => array(
                                        'title' => __('Title', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => __('Subscribe To Unlock', 'pinpointe'),
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                        'hint' => __('<p>Title to display above signup form.</p>', 'pinpointe'),
                                    ),
                                    'lock_message' => array(
                                        'title' => __('Message', 'pinpointe'),
                                        'type' => 'textarea',
                                        'default' => __('Subscribe now to become a premium member and gain access to premium content.', 'pinpointe'),
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                        'hint' => __('<p>Message to display above signup form.</p>', 'pinpointe'),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'checkboxes' => array(
                        'title' => __('Checkbox', 'pinpointe'),
                        'icon' => '<i class="fa fa-check-square-o" style="font-size: 0.8em;"></i>',
                        'children' => array(
                            'checkboxes_settings' => array(
                                'title' => __('Display Checkbox Below Forms', 'pinpointe'),
                                'children' => array(
                                    'checkbox_add_to' => array(
                                        'title' => __('Add signup checkbox to', 'pinpointe'),
                                        'type' => 'checkbox_set',
                                        'default' => array(),
                                        'validation' => array(
                                            'rule' => 'multiple_any',
                                            'empty' => true
                                        ),
                                        'values' => array(
                                            '1' => __('Registration Form', 'pinpointe'),
                                            '2' => __('Comments Form', 'pinpointe'),
                                        ),
                                        'hint' => __('<p>Select WordPress forms where you would like mailing list opt-in checkbox to appear.</p>', 'pinpointe'),
                                    ),
                                    'checkbox_label' => array(
                                        'title' => __('Checkbox label', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => __('Subscribe to our newsletter', 'pinpointe'),
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                        'hint' => __('<p>Label to display next to the checkbox.</p>', 'pinpointe'),
                                    ),
                                    'checkbox_state' => array(
                                        'title' => __('Default state', 'pinpointe'),
                                        'type' => 'dropdown',
                                        'default' => 0,
                                        'validation' => array(
                                            'rule' => 'option',
                                            'empty' => false
                                        ),
                                        'values' => array(
                                            '0' => __('Not Checked', 'pinpointe'),
                                            '1' => __('Checked', 'pinpointe'),
                                        ),
                                        'hint' => __('<p>Default checkbox state.</p>', 'pinpointe'),
                                    ),
                                    'checkbox_list' => array(
                                        'title' => __('Mailing list', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => '',
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                        'hint' => __('<p>Select one of your Pinpointe mailing lists to subscribe visitors to.</p>', 'pinpointe'),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'sync' => array(
                        'title' => __('Sync', 'pinpointe'),
                        'icon' => '<i class="fa fa-refresh" style="font-size: 0.8em;"></i>',
                        'children' => array(
                            'sync_settings' => array(
                                'title' => __('Synchronize User Data', 'pinpointe'),
                                'children' => array(
                                    'sync_roles' => array(
                                        'title' => __('User roles to sync', 'pinpointe'),
                                        'type' => 'checkbox_set',
                                        'default' => array(),
                                        'validation' => array(
                                            'rule' => 'multiple_any',
                                            'empty' => true
                                        ),
                                        'values' => PinpointeSignupForm::get_all_user_roles(),
                                        'hint' => __('<p>Select user roles that you would like to synchronize with Pinpointe.</p> <p>This feature sends data to Pinpointe when one of the following actions occur - user is created, user is updated and user is deleted.</p>', 'pinpointe'),
                                    ),
                                    'sync_list' => array(
                                        'title' => __('Mailing list', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => '',
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                        'hint' => __('<p>Select one of your Pinpointe mailing lists to sync user data with.</p>', 'pinpointe'),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'localization' => array(
                        'title' => __('Localization', 'pinpointe'),
                        'icon' => '<i class="fa fa-font" style="font-size: 0.8em;"></i>',
                        'children' => array(
                            'localization' => array(
                                'title' => __('Date Format', 'pinpointe'),
                                'children' => array(
                                    'date_format' => array(
                                        'title' => __('Date field format', 'pinpointe'),
                                        'type' => 'dropdown',
                                        'default' => 0,
                                        'validation' => array(
                                            'rule' => 'option',
                                            'empty' => false
                                        ),
                                        'values' => array(
                                            '0' => __('dd/mm/yyyy', 'pinpointe'),
                                            '1' => __('dd-mm-yyyy', 'pinpointe'),
                                            '2' => __('dd.mm.yyyy', 'pinpointe'),
                                            '3' => __('mm/dd/yyyy', 'pinpointe'),
                                            '4' => __('mm-dd-yyyy', 'pinpointe'),
                                            '5' => __('mm.dd.yyyy', 'pinpointe'),
                                            '6' => __('yyyy/mm/dd', 'pinpointe'),
                                            '7' => __('yyyy-mm-dd', 'pinpointe'),
                                            '8' => __('yyyy.mm.dd', 'pinpointe'),
                                            '9' => __('dd/mm/yy', 'pinpointe'),
                                            '10' => __('dd-mm-yy', 'pinpointe'),
                                            '11' => __('dd.mm.yy', 'pinpointe'),
                                            '12' => __('mm/dd/yy', 'pinpointe'),
                                            '13' => __('mm-dd-yy', 'pinpointe'),
                                            '14' => __('mm.dd.yy', 'pinpointe'),
                                            '15' => __('yy/mm/dd', 'pinpointe'),
                                            '16' => __('yy-mm-dd', 'pinpointe'),
                                            '17' => __('yy.mm.dd', 'pinpointe'),
                                        ),
                                    ),
                                    'birthday_format' => array(
                                        'title' => __('Birthday field format', 'pinpointe'),
                                        'type' => 'dropdown',
                                        'default' => 0,
                                        'validation' => array(
                                            'rule' => 'option',
                                            'empty' => false
                                        ),
                                        'values' => array(
                                            '0' => __('dd/mm', 'pinpointe'),
                                            '1' => __('dd-mm', 'pinpointe'),
                                            '2' => __('dd.mm', 'pinpointe'),
                                            '3' => __('mm/dd', 'pinpointe'),
                                            '4' => __('mm-dd', 'pinpointe'),
                                            '5' => __('mm.dd', 'pinpointe'),
                                        ),
                                    ),
                                ),
                            ),
                            'labels_settings' => array(
                                'title' => __('Labels', 'pinpointe'),
                                'children' => array(
                                    'label_success' => array(
                                        'title' => __('Subscribed successfully', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => __('Thank you for signing up!', 'pinpointe'),
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                    ),
                                    'label_empty_field' => array(
                                        'title' => __('(Error) Required field empty', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => __('Please enter a value', 'pinpointe'),
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                    ),
                                    'label_invalid_format' => array(
                                        'title' => __('(Error) Invalid format', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => __('Invalid format', 'pinpointe'),
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                    ),
                                    'label_not_number' => array(
                                        'title' => __('(Error) Value not a number', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => __('Please enter a valid number', 'pinpointe'),
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                    ),
                                    'label_already_subscribed' => array(
                                        'title' => __('(Error) Already subscribed', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => __('You are already subscribed to this list', 'pinpointe'),
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                    ),
                                    'label_error' => array(
                                        'title' => __('(Error) Unknown error', 'pinpointe'),
                                        'type' => 'text',
                                        'default' => __('Unknown error. Please try again later.', 'pinpointe'),
                                        'validation' => array(
                                            'rule' => 'string',
                                            'empty' => true
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'help' => array(
                        'title' => '',
                        'icon' => '<i class="fa fa-question" style="font-size: 1em;"></i>',
                        'children' => array(
                            'help_display' => array(
                                'title' => __('Displaying Forms', 'pinpointe'),
                                'children' => array(
                                ),
                            ),
                            /*'help_targeting' => array(
                                'title' => __('Conditions & Targeting', 'pinpointe'),
                                'children' => array(
                                ),
                            ),*/
                            'help_contact' => array(
                                'title' => __('Get In Touch', 'pinpointe'),
                                'children' => array(
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        );

        return $settings;
    }
}

?>
