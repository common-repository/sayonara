<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.therealbenroberts.com
 * @since      1.0.0
 *
 * @package    Sayonara
 * @subpackage Sayonara/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Sayonara
 * @subpackage Sayonara/includes
 * @author     Ben Roberts <me@therealbenroberts.com>
 */
class Sayonara_Activator {

	/**
	 * Custom post type is init here, so we can ensure rewrite rules are flushed.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		$plugin_cpt = new Sayonara_CPT();
		$plugin_cpt->register_sayonara_cpt();

		// ATTENTION: This is *only* done during plugin activation hook in this example!
		// You should *NEVER EVER* do this on every page load!!
		flush_rewrite_rules();

	}

}
