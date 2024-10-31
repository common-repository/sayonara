<?php
/**
* Displays onboarding message in the event of an empty Sayonara list table.
*
* @since 1.0.0
*/


if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

?>

<div class="sayonara-blank-slate">
  <img class="sayonara-blank-slate-image" src="<?php echo(plugin_dir_url( __FILE__ ) . '../images/sayonara.png')?>" alt="<?php _e('Sayonara Logo', 'sayonara'); ?>">
  <h2 class="sayonara-blank-slate-heading"><?php _e('It looks like you haven\'t created your first Sayonara.', 'sayonara'); ?></h2>
  <?php
  echo '<p class="sayonara-blank-slate-message">' . __('Click the button below to get started.', 'sayonara') . '</p>';
  echo '<a class="sayonara-blank-slate-cta button button-primary" href="post-new.php?post_type=sayonara">' . __('Create Sayonara', 'sayonara') . '</a>';
  ?>
  <p class="sayonara-blank-slate-help"><?php _e('Need help? Get started at our ', 'sayonara'); ?><a href="<?php echo SAYONARA_SUPPORT ?>"><?php _e('support page', 'sayonara'); ?></a>.</p>
</div>
