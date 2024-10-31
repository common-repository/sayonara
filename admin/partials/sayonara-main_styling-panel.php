<?php
/**
* Displays the contents of the main content panel.
*
* @since 1.0.0
*/


if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

$this->create_field( 10, null, __('Popup Styles', 'sayonara'), null, null );
$this->create_field( 7, 'popup_color', __('Popup Background Color', 'sayonara'), __('The background color for your popup.', 'sayonara'), '#fff' );
$this->create_field( 1, 'popup_width', __('Popup Width', 'sayonara'), __('The width of your popup. Default is 300px.', 'sayonara'), 'px' );
$this->create_field( 1, 'popup_height', __('Popup Height', 'sayonara'), __('The height of your popup. Default is 300px.', 'sayonara'), 'px' );
$this->create_field( 1, 'popup_padding', __('Popup Padding', 'sayonara'), __('The gap that runs around the edge of your popup. Default is 5px.', 'sayonara'), 'px' );
$this->create_field( 1, 'popup_border_radius', __('Popup Round Corners', 'sayonara'), __('Define how \'rounded\' the popup corners should be. Default is no rounding.', 'sayonara'), 'px' );
$this->create_field( 10, null, __('Overlay Styles', 'sayonara'), null, null );
$this->create_field( 7, 'overlay_color', __('Overlay Color', 'sayonara'), __('The color for your overlay. This is the shading outside your popup that will cover the rest of the page. We recommend you set it to an opposite color to the popup background.', 'sayonara'), '#000' );
$this->create_field( 1, 'overlay_opacity', __('Overlay Opacity', 'sayonara'), __('The higher the opacity, the more prominent the overlay will be. Default is 50%.', 'sayonara'), '%' );
$this->create_field( 10, null, __('Close Button Styles', 'sayonara'), null, null );
$this->create_field( 7, 'close_button_color', __('Close Button Color', 'sayonara'), __('The color for the close button.', 'sayonara'), '#fff' );
$this->create_field( 7, 'close_button_bg_color', __('Close Button Background Color', 'sayonara'), __('The background color for the close button.', 'sayonara'), '#000' );

?>
