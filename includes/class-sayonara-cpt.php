<?php

/**
* The file that defines the custom post type class
*
* @link       https://www.therealbenroberts.com
* @since      1.0.0
*
* @package    Sayonara
* @subpackage Sayonara/includes
*/

/**
* The custom post type class.
*
* @since      1.0.0
* @package    Sayonara
* @subpackage Sayonara/includes
* @author     Ben Roberts <me@therealbenroberts.com>
*/
class Sayonara_CPT {

	/**
	 * Define the core functionality of the plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		add_action('init', array( $this, 'register_sayonara_cpt' ) );
	}

	// Register Custom Post Type
	public function register_sayonara_cpt() {

		$labels = array(
			'name'                  => _x( 'Sayonaras', 'Post Type General Name', 'sayonara' ),
			'singular_name'         => _x( 'Sayonara', 'Post Type Singular Name', 'sayonara' ),
			'menu_name'             => __( 'Sayonara Popups', 'sayonara' ),
			'name_admin_bar'        => __( 'Sayonara Popups', 'sayonara' ),
			'archives'              => __( 'Sayonara Archives', 'sayonara' ),
			'attributes'            => __( 'Sayonara Attributes', 'sayonara' ),
			'parent_item_colon'     => __( 'Parent Item:', 'sayonara' ),
			'all_items'             => __( 'All Sayonaras', 'sayonara' ),
			'add_new_item'          => __( 'Add New Sayonara', 'sayonara' ),
			'add_new'               => __( 'Add New', 'sayonara' ),
			'new_item'              => __( 'New Sayonara', 'sayonara' ),
			'edit_item'             => __( 'Edit Sayonara', 'sayonara' ),
			'update_item'           => __( 'Update Sayonara', 'sayonara' ),
			'view_item'             => __( 'View Sayonara', 'sayonara' ),
			'view_items'            => __( 'View Items', 'sayonara' ),
			'search_items'          => __( 'Search Item', 'sayonara' ),
			'not_found'             => __( 'Not found', 'sayonara' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'sayonara' ),
			'featured_image'        => __( 'Featured Image', 'sayonara' ),
			'set_featured_image'    => __( 'Set featured image', 'sayonara' ),
			'remove_featured_image' => __( 'Remove featured image', 'sayonara' ),
			'use_featured_image'    => __( 'Use as featured image', 'sayonara' ),
			'insert_into_item'      => __( 'Insert into Sayonara', 'sayonara' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'sayonara' ),
			'items_list'            => __( 'Items list', 'sayonara' ),
			'items_list_navigation' => __( 'Items list navigation', 'sayonara' ),
			'filter_items_list'     => __( 'Filter items list', 'sayonara' ),
		);
		$args = array(
			'label'                 => __( 'Sayonara', 'sayonara' ),
			'description'           => __( 'Exit Intent Popup', 'sayonara' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_icon'            => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="511.97" height="512" viewBox="0 0 511.97 512"><title>logout</title><path fill="grey" d="M510.37,226.52a21.31,21.31,0,0,0-4.63-7l-64-64a21.33,21.33,0,0,0-30.16,30.17l27.58,27.58H384v-192A21.32,21.32,0,0,0,362.68,0H21.35a18.13,18.13,0,0,0-2.2.41,17.63,17.63,0,0,0-2.9.53,20.48,20.48,0,0,0-6.12,2.62c-.47.3-1.07.32-1.52.66-.17.13-.23.37-.41.5a21.13,21.13,0,0,0-5.67,6.74,17.9,17.9,0,0,0-.6,1.79,20.1,20.1,0,0,0-1.68,5A12.76,12.76,0,0,0,.31,20.1c0,.42-.3.81-.3,1.23V448a21.32,21.32,0,0,0,17.16,20.91L230.5,511.57a19.78,19.78,0,0,0,4.18.43A21.34,21.34,0,0,0,256,490.67V469.33H362.68A21.32,21.32,0,0,0,384,448V256h55.17L411.6,283.58a21.33,21.33,0,1,0,30.16,30.17l64-64a21.4,21.4,0,0,0,4.63-23.25Zm-319,98.66a21.33,21.33,0,0,1-20.67,16.15,20.53,20.53,0,0,1-5.18-.64L122.85,330a21.33,21.33,0,1,1,10.33-41.39l42.66,10.67A21.33,21.33,0,0,1,191.37,325.18Zm150,101.49H256V85.33A21.34,21.34,0,0,0,240.8,64.9L166.71,42.67H341.35Z" transform="translate(-0.01)"/></svg>'),
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => false,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'sayonara', $args );

	}
}
