<?php
/**
* Displays the contents of the main content panel.
*
* @since 1.0.0
*/


if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

$this->create_field( 8, 'popup_content', __('Popup Content', 'sayonara'), __('This is where you add content to your popup. Use it the same way as you would to add content to a page or post.', 'sayonara'), null );
?>
