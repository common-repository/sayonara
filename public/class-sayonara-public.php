<?php

/**
* The public-facing functionality of the plugin.
*
* @link       https://www.therealbenroberts.com
* @since      1.0.0
*
* @package    Sayonara
* @subpackage Sayonara/public
*/

/**
* The public-facing functionality of the plugin.
*
* @package    Sayonara
* @subpackage Sayonara/public
* @author     Ben Roberts <me@therealbenroberts.com>
*/
class Sayonara_Public {

	/**
	* The ID of this plugin.
	*
	* @since    1.0.0
	* @access   private
	* @var      string    $plugin_name    The ID of this plugin.
	*/
	private $plugin_name;

	/**
	* The version of this plugin.
	*
	* @since    1.0.0
	* @access   private
	* @var      string    $version    The current version of this plugin.
	*/
	private $version;

	/**
	* Initialize the class and set its properties.
	*
	* @since    1.0.0
	* @param      string    $plugin_name       The name of the plugin.
	* @param      string    $version    The version of this plugin.
	*/
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	* Coverts hex to RGBA.
	*
	* @since    1.0.0
	*/
	public function hex2rgba($color, $opacity = false) {
		$default = 'rgb(0,0,0)';
		//Return default if no color provided
		if( empty($color) )
		return $default;
		//Sanitize $color if "#" is provided
		if ($color[0] == '#' ) {
			$color = substr( $color, 1 );
		}
		//Check if color has 6 or 3 characters and get values
		if (strlen($color) == 6) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}
		//Convert hexadec to rgb
		$rgb =  array_map('hexdec', $hex);
		//Check if opacity is set(rgba or rgb)
		if( $opacity ){
			if(abs($opacity) > 1)
			$opacity = 1.0;
			$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
		} else {
			$output = 'rgb('.implode(",",$rgb).')';
		}
		//Return rgb(a) color string
		return $output;
	}

	/**
	* Tests to see if a given page should have a popup set.
	*
	* @since    1.0.0
	* @param      int    $current       The ID of the post.
	*/
	public function get_visibility( $current ) {

		global $post;

		$excludeFront = metadata_exists( 'post', $post->ID, '_sayonara_front_page' ) ? true : false;

		if (is_front_page($current) && $excludeFront) {
			return false;
		}

		$rules = get_post_meta( $post->ID, "_sayonara_visibility_rules", true);
		if ($rules == 'site') {
			return true;
		} else {
			$posts = metadata_exists( 'post', $post->ID, '_sayonara_visibility_posts' ) ? get_post_meta( $post->ID, "_sayonara_visibility_posts", true) : array();
			$in_array = in_array($current, $posts);
			if ($rules == 'include' && $in_array == true) {
				return true;
			} elseif ($rules == 'exclude' && $in_array == false) {
				return true;
			} else {
				return false;
			}
		}
	}

	/**
	* Print debug information.
	*
	* @since    1.0.0
	* @param      int    $id       The ID of the post.
	*/
	public function debug() {

		global $post;

		// echo '<div style="display:none;">';
		echo '<div>';
		echo '<pre>';
		print_r(get_post_meta($post->ID));
		echo '</pre>';
		echo '<br>';
		echo 'Front page: ' . get_option( 'page_on_front' );
		echo '<br>';
		echo 'Posts page: ' . get_option( 'page_for_posts' );
		if (is_front_page()) {
			echo '<br>This IS the front page!';
		}

		echo '</div>';
	}

	/**
	* Register and dynamically populate the stylesheets for the public-facing side of the site.
	*
	* @since    1.0.0
	*/
	public function enqueue_styles() {

		// Get ID of the current page, before we enter our loop
		global $post;
		$current = $post->ID;

		$args = array(
			'post_type'           => 'sayonara',
			'post_status'         => 'publish',
			'posts_per_page'      => 999
		);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		$id = get_the_ID();

		if ($this->get_visibility($current) == false) {
			continue;
		}

		// Debug tool

		// print_r(get_post_meta($id));

		// Our saved values
		$overlay_color = metadata_exists( 'post', $id, '_sayonara_overlay_color' ) ? get_post_meta( $id, '_sayonara_overlay_color', true ) : '#000';
		$overlay_opacity_percentage = metadata_exists( 'post', $id, '_sayonara_overlay_opacity' ) ? get_post_meta( $id, '_sayonara_overlay_opacity', true ) : '50';
		$overlay_opacity = (int) $overlay_opacity_percentage / 100;
		$overlay_rgba = $this->hex2rgba( $overlay_color, $overlay_opacity );
		$popup_priority = metadata_exists( 'post', $id, '_sayonara_popup_priority' ) ? get_post_meta( $id, '_sayonara_popup_priority', true ) : '0';
		$z_index = 1000000000 + $popup_priority;
		$z_index_padding = 1000000000 + $popup_priority + 1;
		$popup_color = get_post_meta( $id, '_sayonara_popup_color', true );
		$popup_padding = metadata_exists( 'post', $id, '_sayonara_popup_padding' ) ? get_post_meta( $id, '_sayonara_popup_padding', true ) . 'px' : '5px';
		$popup_width = metadata_exists( 'post', $id, '_sayonara_popup_width' ) ? get_post_meta( $id, '_sayonara_popup_width', true ) . 'px' : '300px';
		$popup_height = metadata_exists( 'post', $id, '_sayonara_popup_height' ) ? get_post_meta( $id, '_sayonara_popup_height', true ) . 'px' : '300px';
		$popup_border_radius = metadata_exists( 'post', $id, '_sayonara_popup_border_radius' ) ? get_post_meta( $id, '_sayonara_popup_border_radius', true ) . 'px' : '0px';
		$close_button_content = metadata_exists( 'post', $id, '_sayonara_close_button_content' ) ? get_post_meta( $id, '_sayonara_close_button_content', true ) : 'X';
		$close_button_color = get_post_meta( $id, '_sayonara_close_button_color', true );
		$close_button_bg_color = get_post_meta( $id, '_sayonara_close_button_bg_color', true );

		$custom_css = "
		#sayonara-{$id} {
			display: none;
		}
		#sayonara-{$id} .sayonara-overlay {
			position: fixed;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			height:100%;
			width: 100%;
			cursor: pointer;
			background: {$overlay_rgba};
			z-index: {$z_index};

		}
		#sayonara-{$id} .sayonara-content {
			background: {$popup_color};
			padding: {$popup_padding};
			width: {$popup_width};
			height: {$popup_height};
			max-height: 100%;
			position: fixed;
			top: 15%;
			left: 50%;
			transform: translateX(-50%);
			cursor: default;
			overflow: hidden;
			z-index: {$z_index_padding};
			border-radius: {$popup_border_radius};
			box-shadow: 0 0 5px rgba(0,0,0,0.9); /* fallback */
			box-shadow: none;
		}
		#sayonara-{$id} .sayonara-close-btn {
			cursor: pointer;
			position: absolute;
			top: 0;
			right: 0;
			padding: 5px;
			text-align: center;
			font-size: 0.5em;
			font-family: arial;
			color: {$close_button_color};
			background: {$close_button_bg_color};
			/* border-radius: 100%; */
			box-shadow: 0 0 4px rgba(0,0,0,0.3);
		}
		@media only screen and (max-width: 600px) {
			#sayonara-{$id} .sayonara-content {
				max-width: 95%;
			}
		}
		";

		wp_register_style( $this->plugin_name, false );
		wp_enqueue_style( $this->plugin_name );
		wp_add_inline_style( $this->plugin_name, $custom_css );endwhile;
		wp_reset_postdata();

	}

	/**
	* Register the JavaScript for the public-facing side of the site.
	*
	* @since    1.0.0
	*/
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sayonara-public.js', array( 'jquery' ), $this->version, false );
	}

	/**
	* Create our popups on the front-end.
	*
	* @since    1.0.0
	*/
	public function render() {

		// Get ID of the current page, before we enter our loop
		global $post;
		$current = $post->ID;

		$args = array(
			'post_type' => 'sayonara',
			'post_status' => 'publish',
			'posts_per_page' => 999,
		);
		$loop = new WP_Query($args);

		while ($loop->have_posts()) : $loop->the_post();
		$id = get_the_ID();

		if ($this->get_visibility($current) == false) {
			continue;
		}

		$trigger =  metadata_exists( 'post', $id, '_sayonara_trigger_type' ) ? get_post_meta( $id, '_sayonara_trigger_type', true ) : 'exit';

		if ( metadata_exists( 'post', $id, '_sayonara_popup_delay' ) && $trigger == 'delay' ) {
			$sayonara_delay = 'data-sayonara-delay="' . get_post_meta( $id, '_sayonara_popup_delay', true ) . '"';
		} else {
			$sayonara_delay = '';
		}

		if ( metadata_exists( 'post', $id, '_sayonara_popup_scroll' ) && $trigger == 'scroll' ) {
			$sayonara_scroll = 'data-sayonara-scroll="' . get_post_meta( $id, '_sayonara_popup_scroll', true ) . '"';
		} else {
			$sayonara_scroll = '';
		}

		$close_button_content = metadata_exists( 'post', $id, '_sayonara_close_button_content' ) ? get_post_meta( $id, '_sayonara_close_button_content', true ) : 'X';

		if ( metadata_exists( 'post', $id, '_sayonara_ruthless_mode' ) && $trigger == 'exit' ) {
			$ruthless_mode = 'data-ruthless';
		} else {
			$ruthless_mode = '';
		}

		if ( metadata_exists( 'post', $id, '_sayonara_debug_mode' )) {
			$debug_mode = 'data-debug';
		} else {
			$debug_mode = '';
		}

		if ( metadata_exists( 'post', $id, '_sayonara_cookie_time' )) {
			$sayonara_cookie = 'data-cookie="' . get_post_meta( $id, '_sayonara_cookie_time', true ) . '"';
		} else {
			$sayonara_cookie = '';
		}

		// Add this for shortcode support
		$post_content = get_post_meta( get_the_ID(), '_sayonara_popup_content', true );
		?>

		<div class="sayonara" id="sayonara-<?php the_ID(); ?>" data-id="<?php echo $id ?>" data-trigger="<?php echo $trigger ?>" <?php echo $sayonara_cookie ?> <?php echo $ruthless_mode ?> <?php echo $debug_mode ?> <?php echo $sayonara_delay ?> <?php echo $sayonara_scroll ?>>
			<div class="sayonara-overlay"></div>
			<div class="sayonara-content">
				<?php
				echo get_post_meta( get_the_ID(), '_sayonara_popup_content', true );
				?>
				<span class="sayonara-close-btn sayonara-close-btn-<?php the_ID(); ?>" data-id="<?php echo the_ID(); ?>"><?php echo $close_button_content; ?></span>
			</div>
			<?php if ( metadata_exists( 'post', $id, '_sayonara_debug_mode' )) {$this->debug();} ?>
		</div>
	<?php endwhile;}



}
