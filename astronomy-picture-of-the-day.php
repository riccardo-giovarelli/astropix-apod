<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.riccardogiovarelli.it/
 * @since             1.0.0
 * @package           Astronomy_Picture_Of_The_Day
 *
 * @wordpress-plugin
 * Plugin Name:       Astronomy Picture of the Day
 * Plugin URI:        https://www.riccardogiovarelli.it/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Riccardo Giovarelli
 * Author URI:        https://www.riccardogiovarelli.it/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       astronomy-picture-of-the-day
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
define( 'ASTRONOMY_PICTURE_OF_THE_DAY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-astronomy-picture-of-the-day-activator.php
 */
function activate_astronomy_picture_of_the_day() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-astronomy-picture-of-the-day-activator.php';
	Astronomy_Picture_Of_The_Day_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-astronomy-picture-of-the-day-deactivator.php
 */
function deactivate_astronomy_picture_of_the_day() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-astronomy-picture-of-the-day-deactivator.php';
	Astronomy_Picture_Of_The_Day_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_astronomy_picture_of_the_day' );
register_deactivation_hook( __FILE__, 'deactivate_astronomy_picture_of_the_day' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-astronomy-picture-of-the-day.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_astronomy_picture_of_the_day() {

	$plugin = new Astronomy_Picture_Of_The_Day();
	$plugin->run();

}
run_astronomy_picture_of_the_day();
