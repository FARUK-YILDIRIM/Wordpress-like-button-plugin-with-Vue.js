<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://softalika.com/
 * @since      1.0.0
 *
 * @package    Faruklikepul
 * @subpackage Faruklikepul/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Faruklikepul
 * @subpackage Faruklikepul/includes
 * @author     Faruk YILDIRIM <info@softalika.com>
 */
class Faruklikepul_Deactivator {

	/**
	 * Short Description. (use pe)riod
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function deactivate() {

		$this->faruklikepul_delete_tag_list_page();
	}

	/**
	 * Deletes the tag list page when deactive.
	 *
	 * @since    1.0.0
	 */
	public function faruklikepul_delete_tag_list_page() {

		$page_id = get_option("faruklikepul_tag_page");
		wp_delete_post($page_id, true); 
		delete_option("faruklikepul_tag_page");
	}


}
