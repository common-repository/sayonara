<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Sayonara - Advanced Popup Builder
 * Plugin URI:        https://www.therealbenroberts.com/plugins/sayonara
 * Description:       Finally. An advanced popup that doesn't need a monthly subscription!
 * Version:           1.0.1
 * Author:            Ben Roberts
 * Author URI:        https://www.therealbenroberts.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sayonara
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 */
define( 'SAYONARA_VERSION', '1.0.1' );

/**
 * Hold the support page.
 */
define( 'SAYONARA_SUPPORT', 'https://www.therealbenroberts.com/support/sayonara' );

/**
 * Hold the plugin page.
 */
define( 'SAYONARA_PLUGIN', 'https://www.therealbenroberts.com/plugins/sayonara' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sayonara-activator.php
 */
function activate_sayonara() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sayonara-activator.php';
	Sayonara_Activator::activate();
}

add_action( 'fm_post_post', function() {
    $fm = new Fieldmanager_RichTextArea( array(
        'name' => 'demo-field',
    ) );
    $fm->add_meta_box( 'RichTextArea Demo', array( 'post', 'sayonara' ) );
} );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sayonara-deactivator.php
 */
function deactivate_sayonara() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sayonara-deactivator.php';
	Sayonara_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sayonara' );
register_deactivation_hook( __FILE__, 'deactivate_sayonara' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sayonara.php';

/**
 * Let's do this!
 *
 * @since    1.0.0
 */
function run_sayonara() {

	$plugin = new Sayonara();
	$plugin->run();
	$plugin->init();

}
run_sayonara();
