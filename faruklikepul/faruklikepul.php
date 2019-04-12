<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://softalika.com/
 * @since             1.0.0
 * @package           Faruklikepul
 *
 * @wordpress-plugin
 * Plugin Name:       Faruk Like Pul
 * Plugin URI:        https://github.com/frkyldrm/Wordpress-like-button-plugin-with-Vue.js
 * Description:       Liked button for wordpress articles. (BETA)
 * Version:           1.0.0
 * Author:            Faruk YILDIRIM
 * Author URI:        https://softalika.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       faruklikepul
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'FARUKLIKEPUL_VERSION', '1.0.0' );
if (!defined('FARUKLIKEPUL_PLUGIN_DIR'))
define( 'FARUKLIKEPUL_PLUGIN_DIR', plugin_dir_path(__FILE__) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-faruklikepul-activator.php
 */
function activate_faruklikepul() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-faruklikepul-activator.php';
	$activator = new Faruklikepul_Activator();
    $activator->activate();
	
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-faruklikepul-deactivator.php
 */
function deactivate_faruklikepul() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-faruklikepul-deactivator.php';
	$deactivator = new Faruklikepul_Deactivator();
    $deactivator->deactivate();
}

register_activation_hook( __FILE__, 'activate_faruklikepul' );
register_deactivation_hook( __FILE__, 'deactivate_faruklikepul' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-faruklikepul.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_faruklikepul() {

	$plugin = new Faruklikepul();
	$plugin->run();

}
run_faruklikepul();
