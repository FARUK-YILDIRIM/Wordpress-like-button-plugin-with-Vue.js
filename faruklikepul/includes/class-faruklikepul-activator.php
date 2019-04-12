<?php

/**
 * Fired during plugin activation
 *
 * @link       https://softalika.com/
 * @since      1.0.0
 *
 * @package    Faruklikepul
 * @subpackage Faruklikepul/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Faruklikepul
 * @subpackage Faruklikepul/includes
 * @author     Faruk YILDIRIM <info@softalika.com>
 */
class Faruklikepul_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {
		
		$this->faruklikepul_create_tag_list_page();
	}

	/**
	 * Create tag list page when active.
	 * 
	 * @since 1.0.0
	 */	
	public function faruklikepul_create_tag_list_page(){

		$page = array();
		$page['post_title'] = "Faruk Like Pul Tag Lists";
		$page['post_content'] = "This page has been prepared for Faruk Like Pul Tag Lists. Please do not change the URL (faruklikepul-tags). You can change title.";
		$page['post_status'] = "publish";
		$page['post_name'] = "faruklikepul-tags";
		$page['post_type'] = "page";

		$post_id = wp_insert_post($page); 
		add_option("faruklikepul_tag_page", $post_id); 
			
	}

}
