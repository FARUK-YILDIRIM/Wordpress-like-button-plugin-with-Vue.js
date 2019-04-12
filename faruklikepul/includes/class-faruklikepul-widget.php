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
class Faruklikepul_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 * 
	 * @since 1.0.0
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => ' Faruk_Likes_Pul_Liked_Posts ',
			'description' => 'It shows the most liked 10 articles.',
		);
		parent::__construct( 'faruklikepul_liked_posts', '❤️ Top Liked Posts', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
        // outputs the content of the widget
        global $wpdb;
        $sql = " SELECT CAST(wp_postmeta.meta_value AS UNSIGNED)as Liked, 
        wp_posts.post_title as Title, wp_posts.guid as PostLink FROM wp_postmeta 
        INNER JOIN wp_posts ON wp_posts.ID = wp_postmeta.post_id AND wp_postmeta.meta_key = '_faruklikepul_metabox_data' 
        ORDER BY Liked DESC LIMIT 10";
        
        $result = $wpdb->get_results($sql ,ARRAY_A);
        
        _e('<section id="faruklikepul-widget" class="widget widget_recent_entries">'
             .'<h2 class="widget-title"> Liked Posts</h2>' 
             . '<ul>');
            foreach ($result as $data){
            _e('
                <li>
                <a href="'.$data['PostLink'].'">'.$data['Title'].'</a> 
                &hearts; '.$data['Liked'].'
                </li>             
                ');
            }
         _e( '</ul> </section>' );
        
        
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}
