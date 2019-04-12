<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://softalika.com/
 * @since      1.0.0
 *
 * @package    Faruklikepul
 * @subpackage Faruklikepul/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Faruklikepul
 * @subpackage Faruklikepul/public
 * @author     Faruk YILDIRIM <info@softalika.com>
 */
class Faruklikepul_Public {

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
	 * Add Tag List Template
	 * 
	 * @since 1.0.0 
	 */
	public function faruklikepul_tags_page_template(){

		global $post;
        $post_slug = $post->post_name;
        if ($post_slug == "faruklikepul-tags") {
            $page_template = FARUKLIKEPUL_PLUGIN_DIR."/public/partials/faruklikepul-tags-page-template.php";
        }
        return $page_template;
	}

	/**
	 * Like button 
	 * 
	 * @since 1.0.0
	 */
	 public function faruklikepul_like_button(){

		$post_id = intval( $_POST['liked_post_id'] );
			
		if( filter_var( $post_id, FILTER_VALIDATE_INT ) ) {
		
			$article = get_post( $post_id );
			$output_count = 0;
			
			if( !is_null( $article ) ) {
				$count = get_post_meta( $post_id, '_faruklikepul_metabox_data', true );
				if( $count == '' ) {
					update_post_meta( $post_id, '_faruklikepul_metabox_data', '1' );
					$output_count = 1;
				} else {
					$n = intval( $count );
					$n++;
					update_post_meta( $post_id, '_faruklikepul_metabox_data', $n );
					$output_count = $n;
				}
			}
			
		}

		setcookie("faruklikepul_like_cookie_$post_id", $post_id, time()+31556926, "/");
		header('Content-Type: application/json');
		echo json_encode(array("Like" => $output_count)) ;
		wp_die();

	 }

	/**
	 * UnLike button 
	 * 
	 * @since 1.0.0
	 */
	 public function faruklikepul_unlike_button(){

		$post_id = intval( $_POST['liked_post_id'] );
			
		if( filter_var( $post_id, FILTER_VALIDATE_INT ) ) {
		
			$article = get_post( $post_id );
			$output_count = 0;
			
			if( !is_null( $article ) ) {
				$count = get_post_meta( $post_id, '_faruklikepul_metabox_data', true );
				if( $count == '' ) {
					update_post_meta( $post_id, '_faruklikepul_metabox_data', '1' );
					$output_count = 1;
				} else {
					$n = intval( $count );
					$n--;
					update_post_meta( $post_id, '_faruklikepul_metabox_data', $n );
					$output_count = $n;
				}
			}
			
		}

		setcookie("faruklikepul_like_cookie_$post_id", $post_id, time()-1 , "/");
		header('Content-Type: application/json');
		echo json_encode(array("Like" => $output_count)) ;
		wp_die();

	 }

	/**
	 * Add post like button end of the contents.
	 * 
	 * @since 1.0.0
	 */
	public function faruklikepul_post_like( $content ){
		
		if ( is_main_query() && is_singular('post') ) {

			wp_enqueue_script( 'fy-vue.js', plugin_dir_url( __FILE__ ) . 'js/fy-vue.js', array( 'jquery' ), $this->version, true );
			
			
			require (__DIR__)."/partials/faruklikepul-post-like.php";	
			 }else{
			return  $content;
		}
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style("datatables.min.css", plugin_dir_url(__FILE__) . 'css/jquery.dataTables.min.css', array(), $this->version, 'all');
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/faruklikepul-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script('vue-js',  plugin_dir_url( __FILE__)  . 'js/vue.js', array(), true );   
		wp_enqueue_script( 'datatables.js', plugin_dir_url( __FILE__ ) . 'js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/faruklikepul-public.js', array( 'jquery' ), $this->version, true );  
		wp_enqueue_script('faruklikepul-public.js', plugin_dir_url( __FILE__)  . 'js/faruklikepul-public.js', array( 'jquery' , $this->plugin_name ), $this->$version, true );          
		wp_localize_script("faruklikepul-public.js", "admin_ajax_url", admin_url("admin-ajax.php"));
	}

}
