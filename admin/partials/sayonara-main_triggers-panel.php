<?php
/**
* Displays the contents of the main content panel.
*
* @since 1.0.0
*/


if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

$this->create_field( 4, 'trigger_type', __('Trigger Type', 'sayonara'), __('Choose how to make your popup appear.', 'sayonara'), array(
  array (
    'label' => 'On Exit',
    'value' => 'exit',
    'default' => true
  ),
  array (
    'label' => 'Delay',
    'value' => 'delay',
    'default' => false
  ),
  array (
    'label' => 'Scroll',
    'value' => 'scroll',
    'default' => false
  )
) );

$this->create_field( 5, 'ruthless_mode', __('Ruthless Mode', 'sayonara'), __('By default, Sayonara allows users to move out of the browser window for a tiny amount of time (around a second). This prevents accidental triggering. Ruthless mode shows a popup instantly. We do not recommend you turn this on, unless you have a specific reason to do so.', 'sayonara'), array(
  array (
    'label' => 'Use Ruthless Mode',
    'value' => 'ruthless',
    'checked' => false
  )
) );

$this->create_field( 2, 'popup_delay', __('Set Delay', 'sayonara'), __('Number of seconds until the popup should appear. Defaults to 10 seconds.', 'sayonara'), 'seconds' );

$this->create_field( 2, 'popup_scroll', __('Set Scroll Amount', 'sayonara'), __('How far down the page before the popup is triggered.', 'sayonara'), '%' );

?>
