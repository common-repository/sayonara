<?php

/**
* The admin-specific functionality of the plugin.
*
* @link       https://www.therealbenroberts.com
* @since      1.0.0
*
* @package    Sayonara
* @subpackage Sayonara/admin
*/

/**
* The admin-specific functionality of the plugin.
*
* Defines the plugin name, version, and two examples hooks for how to
* enqueue the admin-specific stylesheet and JavaScript.
*
* @package    Sayonara
* @subpackage Sayonara/admin
* @author     Ben Roberts <me@therealbenroberts.com>
*/
class Sayonara_Admin {

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
	* Holds our individual main metabox screens.
	*
	* @since    1.0.0
	* @access   private
	* @var      array    $screens    An array of screens.
	*/
	private $screens = array(
		'main_content' => array(
			'slug' => 'main_content', // ID of this screen
			'class' => '', // Allows extra classes
			'label' => 'Main Content', // Will be displayed to user in tab
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 20 20"><rect x="0" fill="none" /><g><path d="M16.89 1.2l1.41 1.41c.39.39.39 1.02 0 1.41L14 8.33V18H3V3h10.67l1.8-1.8c.4-.39 1.03-.4 1.42 0zm-5.66 8.48l5.37-5.36-1.42-1.42-5.36 5.37-.71 2.12z"/></g></svg>', // Uses an SVG
			'enabled' => true // Is this screen active in the current version?
		),
		'main_styling' => array(
			'slug' => 'main_styling', // ID of this screen
			'class' => '', // Allows extra classes
			'label' => 'Styling Options', // Will be displayed to user in tab
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 20 20"><rect x="0" fill="none" /><g><path d="M14.48 11.06L7.41 3.99l1.5-1.5c.5-.56 2.3-.47 3.51.32 1.21.8 1.43 1.28 2.91 2.1 1.18.64 2.45 1.26 4.45.85zm-.71.71L6.7 4.7 4.93 6.47c-.39.39-.39 1.02 0 1.41l1.06 1.06c.39.39.39 1.03 0 1.42-.6.6-1.43 1.11-2.21 1.69-.35.26-.7.53-1.01.84C1.43 14.23.4 16.08 1.4 17.07c.99 1 2.84-.03 4.18-1.36.31-.31.58-.66.85-1.02.57-.78 1.08-1.61 1.69-2.21.39-.39 1.02-.39 1.41 0l1.06 1.06c.39.39 1.02.39 1.41 0z"/></g></svg>', // Uses an SVG
			'enabled' => true // Is this screen active in the current version?
		),
		'main_triggers' => array(
			'slug' => 'main_triggers', // ID of this screen
			'class' => '', // Allows extra classes
			'label' => 'Triggers', // Will be displayed to user in tab
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 20 20"><rect x="0" fill="none" /><g><path d="M10 2c4.42 0 8 3.58 8 8s-3.58 8-8 8-8-3.58-8-8 3.58-8 8-8zm0 14c3.31 0 6-2.69 6-6s-2.69-6-6-6-6 2.69-6 6 2.69 6 6 6zm-.71-5.29c.07.05.14.1.23.15l-.02.02L14 13l-3.03-3.19L10 5l-.97 4.81h.01c0 .02-.01.05-.02.09S9 9.97 9 10c0 .28.1.52.29.71z"/></g></svg>', // Uses an SVG
			'enabled' => true // Is this screen active in the current version?
		),
		'main_visibility' => array(
			'slug' => 'main_visibility', // ID of this screen
			'class' => '', // Allows extra classes
			'label' => 'Visibility', // Will be displayed to user in tab
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 20 20"><rect x="0" fill="none" /><g><path d="M6 15V2h10v13H6zm-1 1h8v2H3V5h2v11z"/></g></svg>', // Uses an SVG
			'enabled' => true // Is this screen active in the current version?
		),
		'main_settings' => array(
			'slug' => 'main_settings', // ID of this screen
			'class' => '', // Allows extra classes
			'label' => 'Settings', // Will be displayed to user in tab
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 20 20"><rect x="0" fill="none" /><g><path d="M18 16V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v12c0 .55.45 1 1 1h13c.55 0 1-.45 1-1zM8 11h1c.55 0 1 .45 1 1s-.45 1-1 1H8v1.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5V13H6c-.55 0-1-.45-1-1s.45-1 1-1h1V5.5c0-.28.22-.5.5-.5s.5.22.5.5V11zm5-2h-1c-.55 0-1-.45-1-1s.45-1 1-1h1V5.5c0-.28.22-.5.5-.5s.5.22.5.5V7h1c.55 0 1 .45 1 1s-.45 1-1 1h-1v5.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5V9z"/></g></svg>', // Uses an SVG
			'enabled' => true // Is this screen active in the current version?
		)
	);

	/**
	* Initialize the class and set its properties.
	*
	* @since    1.0.0
	* @param      string    $plugin_name       The name of this plugin.
	* @param      string    $version    The version of this plugin.
	*/
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// Maintain active tab query parameter after save.
		add_filter( 'redirect_post_location', array( $this, 'maintain_active_tab' ), 10, 2 );

	}

	/**
	* Register the stylesheets for the admin area.
	*
	* @since    1.0.0
	*/
	public function enqueue_styles() {

		if ( 'sayonara' == get_current_screen()->post_type ) {

			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sayonara-admin.css', array( 'wp-color-picker' ), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name . '-select2', plugin_dir_url( __FILE__ ) . 'css/select2.min.css', array( ), $this->version, 'all' );
		}
	}

	/**
	* Register the JavaScript for the admin area.
	*
	* @since    1.0.0
	*/
	public function enqueue_scripts() {

		if ( 'sayonara' == get_current_screen()->post_type ) {

			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sayonara-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name . '-select2', plugin_dir_url( __FILE__ ) . 'js/select2.min.js', array( ), $this->version, false );
		}
	}

	/**
	* Initializes blank slate content if a list table is empty.
	*
	* @since 1.0.0
	*/
	public function blank_slate() {

		$blank_slate = new Sayonara_Blank_Slate();
		$blank_slate->init();

	}

	/**
	* Sets up our metaboxes.
	*
	* @since 1.0.0
	*/
	public function create_metaboxes() {

		add_meta_box( 'sayonara_primary', 'Popup Customizer', array($this, 'render_metabox'), 'sayonara' );

	}

	/**
	* Sets up our fields.
	*
	* @since 1.0.0
	*/
	public function create_field( $type, $id, $label, $description, $values ) {

		// $type 1: text input
		// $type 2: number input
		// $type 3: textarea
		// $type 4: radio buttons (use $values property)
		// $type 5: checkboxes (use $values property)
		// $type 6: select (use $values property)
		// $type 7: color picker (use $values property to set default color)
		// $type 8: wp_editor
		// $type 10: heading

		if ( !empty($type) && $type == 10 ) {
			echo '<h4 class="sayonara-heading">' . esc_html__($label, 'sayonara') . '</h4>';
			return;
		}

		global $post;

		$meta = '_sayonara_' . $id;

		echo '<fieldset class="sayonara-field-wrap _sayonara_' . esc_attr($id) . '_field"><span class="sayonara-field-label">' .  esc_html__($label, 'sayonara') . '</span><legend class="screen-reader-text">' . esc_html__($label, 'sayonara') . '</legend>';

		switch ( $type ) {
			case 1:
			echo '<input type="text" name="_sayonara_' . esc_attr($id) . '" id="sayonara_' . esc_attr($id) . '" value="';
			echo $post->$meta ? esc_html($post->$meta) : '';
			echo '" class="sayonara-field">';
			if ( isset($values) ) {
				echo '<span class="sayonara-input-suffix">' .  esc_html__($values, 'sayonara') . '</span>';
			}
			break;
			case 2:
			echo '<input type="number" name="_sayonara_' . esc_attr($id) . '" id="sayonara_' . esc_attr($id) . '" value="';
			echo $post->$meta ? esc_html($post->$meta) : '';
			echo '" class="sayonara-field">';
			if ( isset($values) ) {
				echo '<span class="sayonara-input-suffix">' .  esc_html__($values, 'sayonara') . '</span>';
			}
			break;
			case 3:
			echo '<textarea name="_sayonara_' . esc_attr($id) . '" id="sayonara_' . esc_attr($id) . '" value="" class="sayonara-field sayonara-textarea">';
			echo $post->$meta ? esc_textarea($post->$meta) : '';
			echo '</textarea>';
			break;
			case 4:
			echo '<ul class="sayonara-radios">';
			foreach ( $values as $radio ) {
				if ( $radio['default'] == true ) {
					$checked = isset( $post->$meta ) ? checked( $post->$meta, $radio['value'], false ) : 'checked="checked"';
				} else {
					$checked = checked( $post->$meta, $radio['value'], false );
				}
				echo '<li>';
				echo '<label><input name="_sayonara_' . esc_attr($id) . '" id="sayonara_' . esc_attr($id) . '" value="' . esc_attr($radio['value']) . '" type="radio" ' .  $checked . '>' .  esc_html__($radio['label'], 'sayonara') . '</label>';
				echo '</li>';
			}
			echo '</ul>';
			break;
			case 5:
			echo '<ul class="sayonara-checkboxes">';
			$array = get_post_meta( $post->ID, $meta, true );
			$existing = empty($array) ? [] : $array;
			foreach ( $values as $checkbox ) {
				if ( in_array( $checkbox['value'], $existing ) ) {
					$checked = 'checked="checked"';
				} else {
					$checked = '';
				}
				echo '<li>';
				echo '<label><input name="_sayonara_' . esc_attr($id) . '[]" id="sayonara_' . esc_attr($id) . '" value="' . esc_attr($checkbox['value']) . '" type="checkbox" ' . $checked . ' >' .  esc_html__($checkbox['label'], 'sayonara') . '</label>';
				echo '</li>';
			}
			echo '</ul>';
			break;
			case 7:
			echo '<input type="text" data-default-color="' . esc_attr($values) . '" name="_sayonara_' . esc_attr($id) . '" id="sayonara_' . esc_attr($id) . '" value="';
			echo $post->$meta ? esc_html($post->$meta) : esc_attr($values);
			echo '" class="sayonara-field sayonara-color-picker">';
			break;
			case 8:
			wp_editor( html_entity_decode($post->$meta), 'sayonara_main_editor', array(
				'textarea_name' => $meta,
				'textarea_rows' => 15
			));
			break;
			default:
			// code...
			break;
		}
		echo '<span class="sayonara-field-description">' . __($description, 'sayonara') . '</span></fieldset>';
	}

	/**
	* Render metabox content.
	*
	* @since 1.0.0
	*/
	public function render_metabox( $post ) {

		// Use nonce for verification
		wp_nonce_field( plugin_basename( __FILE__ ), 'sayonara_primary_nonce' );

		$url = add_query_arg(array('post'=>get_the_ID(), 'action'=>'edit'));

		$active_tab = ! empty( $_GET['sayonara_tab'] ) ? sanitize_text_field( $_GET['sayonara_tab'] ) : 'main_content';
		?>
		<input id="sayonara_form_active_tab" type="hidden" name="sayonara_form_active_tab" value="<?php echo $active_tab ?>">
		<div class="sayonara-metabox-panel-wrap">
			<ul class="sayonara-form-data-tabs sayonara-metabox-tabs">
				<?php
				if ( ! empty( $this->screens ) ) {
					foreach ( $this->screens as $screen ) {
						if ( $screen['enabled'] == true ) {
							echo '<li class="' . $screen['slug'] . '_tab"><a href="' . $url . '" data-tab-id="' . $screen['slug'] . '"><span class="sayonara-icon">' . $screen['icon'] . '</span><span class="sayonara-label">' . __($screen['label'], 'sayonara') . '</span></a></li>';
						}
					}
				}
				?>

			</ul>
			<?php $this->render_metabox_screens(); ?>
		</div>

		<?php

	}

	/**
	* Render metabox screen content.
	*
	* @since 1.0.0
	*/
	public function render_metabox_screens() {
		global $post;
		if ( ! empty( $this->screens ) ) {
			foreach ( $this->screens as $screen ) {
				if ( $screen['enabled'] == true ) {
					echo '<div id="' . $screen['slug'] . '" class="panel sayonara_options_panel sayonara_' . $screen['slug'] . '_panel">';
					require_once plugin_dir_path( __FILE__  ) . 'partials/sayonara-' . $screen['slug'] . '-panel.php';
					echo '<p class="sayonara-docs-link"><a href="' . SAYONARA_SUPPORT . '/' . $screen['slug'] .'" target="_blank">Need Help? See docs on "' . __($screen['label'], 'sayonara') . '"<span class="dashicons dashicons-editor-help"></span></a></p>';
					echo '</div>';
				}
			}
		}
	}

	/**
	* Check post meta is not empty, but still allowing for '0' as a value.
	*
	* @since 1.0.0
	*/
	public function empty_str( $str ) {
		return ! is_null( $str ) || $str === "";
	}

	/**
	* Save post meta.
	*
	* @since 1.0.0
	*/
	public function save( $post_id ) {

		// verify if this is an auto save routine.
		// If it is our form has not been submitted, so we dont want to do anything
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

		// verify this came from the our screen and with proper authorization,
		// because save_post can be triggered at other times
		if ( ( isset ( $_POST['sayonara_primary_nonce'] ) ) && ( ! wp_verify_nonce( $_POST['sayonara_primary_nonce'], plugin_basename( __FILE__ ) ) ) )
		return;

		// Check permissions
		if ( ( isset ( $_POST['post_type'] ) ) && ( 'page' == $_POST['post_type'] )  ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		}
		else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}
		}

		// Okay, safe to start the save procedure
		if ( ! empty( $_POST['_sayonara_popup_content'] ) ) {
			update_post_meta( $post_id, '_sayonara_popup_content',  wp_kses_post($_POST['_sayonara_popup_content'] ) );
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_popup_content', true ) ) {
				delete_post_meta( $post_id, '_sayonara_popup_content' );
			}
		}

		if ( ! empty( $_POST['_sayonara_popup_color'] ) ) {
			update_post_meta( $post_id, '_sayonara_popup_color', sanitize_hex_color( $_POST['_sayonara_popup_color'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_popup_color', true ) ) {
				delete_post_meta( $post_id, '_sayonara_popup_color' );
			}
		}

		if ( ! empty( $_POST['_sayonara_popup_width'] ) ) {
			update_post_meta( $post_id, '_sayonara_popup_width', sanitize_text_field( $_POST['_sayonara_popup_width'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_popup_width', true ) ) {
				delete_post_meta( $post_id, '_sayonara_popup_width' );
			}
		}

		if ( ! empty( $_POST['_sayonara_popup_height'] ) ) {
			update_post_meta( $post_id, '_sayonara_popup_height', sanitize_text_field( $_POST['_sayonara_popup_height'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_popup_height', true ) ) {
				delete_post_meta( $post_id, '_sayonara_popup_height' );
			}
		}

		if ( ! empty( $_POST['_sayonara_popup_padding'] ) ) {
			update_post_meta( $post_id, '_sayonara_popup_padding', sanitize_text_field( $_POST['_sayonara_popup_padding'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_popup_padding', true ) ) {
				delete_post_meta( $post_id, '_sayonara_popup_padding' );
			}
		}

		if ( ! empty( $_POST['_sayonara_popup_border_radius'] ) ) {
			update_post_meta( $post_id, '_sayonara_popup_border_radius', sanitize_text_field( $_POST['_sayonara_popup_border_radius'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_popup_border_radius', true ) ) {
				delete_post_meta( $post_id, '_sayonara_popup_border_radius' );
			}
		}

		if ( ! empty( $_POST['_sayonara_overlay_color'] ) ) {
			update_post_meta( $post_id, '_sayonara_overlay_color', sanitize_hex_color( $_POST['_sayonara_overlay_color'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_overlay_color', true ) ) {
				delete_post_meta( $post_id, '_sayonara_overlay_color' );
			}
		}

		if ( ! empty( $_POST['_sayonara_overlay_opacity'] ) ) {
			update_post_meta( $post_id, '_sayonara_overlay_opacity', sanitize_text_field( $_POST['_sayonara_overlay_opacity'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_overlay_opacity', true ) ) {
				delete_post_meta( $post_id, '_sayonara_overlay_opacity' );
			}
		}

		if ( ! empty( $_POST['_sayonara_close_button_color'] ) ) {
			update_post_meta( $post_id, '_sayonara_close_button_color', sanitize_hex_color( $_POST['_sayonara_close_button_color'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_close_button_color', true ) ) {
				delete_post_meta( $post_id, '_sayonara_close_button_color' );
			}
		}

		if ( ! empty( $_POST['_sayonara_close_button_bg_color'] ) ) {
			update_post_meta( $post_id, '_sayonara_close_button_bg_color', sanitize_hex_color( $_POST['_sayonara_close_button_bg_color'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_close_button_bg_color', true ) ) {
				delete_post_meta( $post_id, '_sayonara_close_button_bg_color' );
			}
		}

		if ( ! empty( $_POST['_sayonara_trigger_type'] ) ) {
			update_post_meta( $post_id, '_sayonara_trigger_type', sanitize_text_field( $_POST['_sayonara_trigger_type'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_trigger_type', true ) ) {
				delete_post_meta( $post_id, '_sayonara_trigger_type' );
			}
		}

		if ( ! empty( $_POST['_sayonara_ruthless_mode'] ) ) {
			$array = array_map( 'esc_attr', (array) $_POST['_sayonara_ruthless_mode'] );
			update_post_meta( $post_id, '_sayonara_ruthless_mode', $array );
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_ruthless_mode', true ) ) {
				delete_post_meta( $post_id, '_sayonara_ruthless_mode' );
			}
		}

		if ( ! empty( $_POST['_sayonara_debug_mode'] ) ) {
			$array = array_map( 'esc_attr', (array) $_POST['_sayonara_debug_mode'] );
			update_post_meta( $post_id, '_sayonara_debug_mode', $array );
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_debug_mode', true ) ) {
				delete_post_meta( $post_id, '_sayonara_debug_mode' );
			}
		}

		if ( ! empty( $_POST['_sayonara_front_page'] ) ) {
			$array = array_map( 'esc_attr', (array) $_POST['_sayonara_front_page'] );
			update_post_meta( $post_id, '_sayonara_front_page', $array );
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_front_page', true ) ) {
				delete_post_meta( $post_id, '_sayonara_front_page' );
			}
		}

		if ( ! empty( $_POST['_sayonara_popup_delay'] ) ) {
			update_post_meta( $post_id, '_sayonara_popup_delay', sanitize_text_field( $_POST['_sayonara_popup_delay'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_popup_delay', true ) ) {
				delete_post_meta( $post_id, '_sayonara_popup_delay' );
			}
		}

		if ( ! empty( $_POST['_sayonara_popup_scroll'] ) ) {
			update_post_meta( $post_id, '_sayonara_popup_scroll', sanitize_text_field( $_POST['_sayonara_popup_scroll'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_popup_scroll', true ) ) {
				delete_post_meta( $post_id, '_sayonara_popup_scroll' );
			}
		}

		if ( ! empty( $_POST['_sayonara_close_button_content'] ) ) {
			update_post_meta( $post_id, '_sayonara_close_button_content', sanitize_text_field( $_POST['_sayonara_close_button_content'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_close_button_content', true ) ) {
				delete_post_meta( $post_id, '_sayonara_close_button_content' );
			}
		}

		if ( ! empty( $_POST['_sayonara_visibility_rules'] ) ) {
			update_post_meta( $post_id, '_sayonara_visibility_rules', sanitize_text_field( $_POST['_sayonara_visibility_rules'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_visibility_rules', true ) ) {
				delete_post_meta( $post_id, '_sayonara_visibility_rules' );
			}
		}

		if ( ! empty( $_POST['_sayonara_cookie_time'] ) ) {
			update_post_meta( $post_id, '_sayonara_cookie_time', sanitize_text_field( $_POST['_sayonara_cookie_time'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_cookie_time', true ) ) {
				delete_post_meta( $post_id, '_sayonara_cookie_time' );
			}
		}

		if ( ! empty( $_POST['_sayonara_popup_priority'] ) ) {
			update_post_meta( $post_id, '_sayonara_popup_priority', sanitize_text_field( $_POST['_sayonara_popup_priority'] ));
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_popup_priority', true ) ) {
				delete_post_meta( $post_id, '_sayonara_popup_priority' );
			}
		}

		if ( ! empty( $_POST['_sayonara_visibility_posts'] ) ) {
			$array = array_map( 'esc_attr', (array) $_POST['_sayonara_visibility_posts'] );
			update_post_meta( $post_id, '_sayonara_visibility_posts', $array );
		} else {
			if ( '' !== get_post_meta( $post_id, '_sayonara_visibility_posts', true ) ) {
				delete_post_meta( $post_id, '_sayonara_visibility_posts' );
			}
		}
	}

	/**
	* Maintain the active tab after save.
	*
	* @param string $location The destination URL.
	* @param int    $post_id  The post ID.
	*
	* @since  1.0.0
	* @access public
	*
	* @return string The URL after redirect.
	*/
	public function maintain_active_tab( $location, $post_id ) {
		if ( 'sayonara' === get_post_type( $post_id ) && ! empty( $_POST['sayonara_form_active_tab'] ) ) {
			$location = add_query_arg( 'sayonara_tab', $_POST['sayonara_form_active_tab'], $location );
		}

		return $location;
	}

	/**
	 * Add rating links to the admin dashboard
	 *
	 * @param string		$footer_text The existing footer text
	 *
	 * @return 	string
	 * @since  	1.0.1
	 * @global 	string $typenow, $pagenow
	 *
	 */
	function sayonara_admin_rate_us( $footer_text )
	{
			global  $typenow ;

			if ( 'sayonara' === $typenow ) {
					$rate_text = sprintf(
							/* translators: %s: Link to 5 star rating */
							__( 'If you like <strong>Sayonara</strong> please leave us a %s rating. It takes a minute and helps a lot. Thanks in advance!', 'sayonara' ),
							'<a href="https://wordpress.org/support/view/plugin-reviews/sayonara-advanced-popup-builder?filter=5#postform" target="_blank" class="sayonara-rating-link" style="text-decoration:none;" data-rated="' . esc_attr__( 'Thanks :)', 'sayonara' ) . '">&#9733;&#9733;&#9733;&#9733;&#9733;</a>'
					);
					return $rate_text;
			} else {
					return $footer_text;
			}

	}

}
