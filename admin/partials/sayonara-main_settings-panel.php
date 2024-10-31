<?php
/**
* Displays the contents of the main settings panel.
*
* @since 1.0.0
*/


if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

$this->create_field( 10, null, __('Close Button Settings', 'sayonara'), null, null );
$this->create_field( 1, 'close_button_content', __('Close Button Content', 'sayonara'), __('The content displayed in the close button. Defaults to a cross.', 'sayonara'), null );
$this->create_field( 10, null, __('Popup Recurrence', 'sayonara'), null, null );
$this->create_field( 2, 'cookie_time', __('Days before showing popup again', 'sayonara'), __('Sets a cookie that stops the popup from reappearing for the chosen number of days. If you do not enter a value, the popup will keep appearing. We suggest you enter a value, unless you are testing, as popups that appear too often may affect whether visitors stay on your site.', 'sayonara'), 'days' );
$this->create_field( 10, null, __('Popup Priority', 'sayonara'), null, null );
$this->create_field( 2, 'popup_priority', __('Enter a priority number', 'sayonara'), __('Enter a number to set where your popup will sit in relation to others. If you want this popup to be in front of another, this number must be higher than the other\'s priority figure. This will allow you to have more than one popup on the same page.', 'sayonara'), null );
$this->create_field( 10, null, __('Advanced Settings', 'sayonara'), null, null );
$this->create_field( 5, 'debug_mode', __('Debug Mode', 'sayonara'), __('Debug mode adds diagnostic information to the popup. This means that we can see how you have configured the popup, and therefore support you better. No personal information is included, and the data is hidden, so your site visitors won\'t see it.', 'sayonara'), array(
  array (
    'label' => 'Use Debug Mode',
    'value' => 'debug',
    'checked' => false
  )
) );
?>
