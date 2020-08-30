<?php

/**
 *
 * @link              https://www.riccardogiovarelli.it/
 * @since             1.0.0
 * @package           Astropix_Apod
 *
 * @wordpress-plugin
 * Plugin Name:       Astropix Apod
 * Plugin URI:        https://www.riccardogiovarelli.it/
 * Version:           1.0.0
 * Author:            Riccardo Giovarelli
 * Author URI:        https://www.riccardogiovarelli.it/
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       astropix-apod
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
define( 'PLUGIN_ASTROPIX_APOD_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-astropix-apod-activator.php
 */
function activate_astropix_apod() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-astropix-apod-activator.php';
	Astropix_Apod_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-astropix-apod-deactivator.php
 */
function deactivate_astropix_apod() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-astropix-apod-deactivator.php';
	Astropix_Apod_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_astropix_apod' );
register_deactivation_hook( __FILE__, 'deactivate_astropix_apod' );


// Register shortcode
require plugin_dir_path( __FILE__ ) . 'resources/class-astropix-apod.php';
function astropix_apod_render($atts, $content, $tag) {	 
	return Astropix_Apod_Rss::astropix_apod_render($atts, $content, $tag);
}
add_shortcode('astropix-apod', 'astropix_apod_render');


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-astropix-apod.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_astropix_apod() {

	$plugin = new Astropix_Apod();
	$plugin->run();

}
run_astropix_apod();
