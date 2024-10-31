<?php
/**
* Displays the contents of the main content panel.
*
* @since 1.0.0
*/


if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

$this->create_field( 4, 'visibility_rules', __('Where should the popup appear?', 'sayonara'), __('Select the conditions the popup appears under. Use with the page picker below.', 'sayonara'), array(
  array (
    'label' => 'Whole Site',
    'value' => 'site',
    'default' => true
  ),
  array (
    'label' => 'Only on pages below',
    'value' => 'include',
    'default' => false
  ),
  array (
    'label' => 'Everywhere, except pages below',
    'value' => 'exclude',
    'default' => false
  )
) );

echo '<fieldset class="sayonara-field-wrap _sayonara_visibility_posts_field"><span class="sayonara-field-label">' .  esc_html__('Select Pages', 'sayonara') . '</span><legend class="screen-reader-text">' . esc_html__('Select Pages', 'sayonara') . '</legend>';
echo '<select id="sayonara_visibility_posts" name="_sayonara_visibility_posts[]" multiple="multiple">';
  // global $post;
  $args = array( 'order'=> 'ASC', 'orderby' => 'title', 'post_type' => 'any', 'numberposts' => 100 );
  $pages = get_posts( $args );
  $array = (array) get_post_meta( $post->ID, '_sayonara_visibility_posts', true );
  $string = ' selected="selected"';
  foreach ( $pages as $page ) {
    $selected = in_array( $page->ID, $array ) ? $string : '';
    $option = '<option value="' . $page->ID . '" ' . $selected . '>';
    $option .= $page->post_title;
    $option .= '</option>';
    echo $option;
  }
echo '</select>';
echo '<span class="sayonara-field-description">' . __('Click the box to see a list of all pages on the site. Select as many as you need. To clear all, click the cross.', 'sayonara') . '</span></fieldset>';
$this->create_field( 5, 'front_page', __('Exclude Front Page', 'sayonara'), __('WordPress deals with front pages slightly differently to others. This is because you can set it directly from the Reading Settings page. To disable the popup on your front page, tick this box.', 'sayonara'), array(
  array (
    'label' => 'Do not show popup on the front page',
    'value' => 'front_page',
    'checked' => false
  )
) );

?>
