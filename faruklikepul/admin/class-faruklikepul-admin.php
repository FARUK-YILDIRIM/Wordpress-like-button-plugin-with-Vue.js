<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://softalika.com/
 * @since      1.0.0
 *
 * @package    Faruklikepul
 * @subpackage Faruklikepul/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Faruklikepul
 * @subpackage Faruklikepul/admin
 * @author     Faruk YILDIRIM <info@softalika.com>
 */
class Faruklikepul_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register Widget.
	 * 
	 * @since 1.0.0
	*/
	public function faruklikepost_register_widget(){
		register_widget('Faruklikepul_Widget');
	}

	/**
	 * Add Meta Box.
	 * 
	 * @since 1.0.0
	*/
	public function  faruklikepost_postmeta() {
		add_meta_box( 'post_metabox', '❤️ Post Like', [$this,'faruklikepost_metabox_content'], 'post' );
	}

	/**
	 * Metabox Content.
	 * 
	 * @since 1.0.0
	*/
	public function  faruklikepost_metabox_content() {
		require (__DIR__)."/partials/faruklikepul-postlike-metabox.php";
	}
	
	/**
	 * For Like data.
	 * 
	 * @since 1.0.0
	*/
	public function faruklikepost_postmeta_save( $post_id ) {
		$mydata = sanitize_text_field( $_POST['_faruklikepul_metabox_data'] );
		if( filter_var( $mydata, FILTER_VALIDATE_INT ) ) {
		update_post_meta( $post_id, '_faruklikepul_metabox_data', $mydata );
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/faruklikepul-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/faruklikepul-admin.js', array( 'jquery' ), $this->version, false );

	}

}
