<?php

// This file is part of Astropix Apod.

// Astropix Apod is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

// Astropix Apod is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// You should have received a copy of the GNU General Public License
// along with Astropix Apod.  If not, see <http://www.gnu.org/licenses/>.

// Copyright 2020 Riccardo Giovarelli <riccardo.giovarelli@gmail.com>


/**
 * Plugin Name:       Astropix Apod
 * Plugin URI:        https://github.com/riccardo-giovarelli/wordpress-astropix-apod
 * Version:           1.0.10
 * Requires at least: 5.5
 * Author:            Riccardo Giovarelli
 * Author URI:        https://www.riccardogiovarelli.it/
 * Description:		  Show Astronomy Picture of the Day by Nasa with a simple shortcode
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       astropix-apod
 * Domain Path:       /languages
 */


// Abort if this file is called directly
if (!defined('WPINC')) {
	die;
}

// Currently plugin version
define('PLUGIN_ASTROPIX_APOD_VERSION', '1.0.10');

// Required files
require plugin_dir_path(__FILE__) . 'resources/class-astropix-apod-rss.php';
require plugin_dir_path(__FILE__) . 'includes/class-astropix-apod.php';

/**
 * Plugin activation
 */
function activate_astropix_apod()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-astropix-apod-activator.php';
	Astropix_Apod_Activator::activate();
}

// Register plugin activation fucntion
register_activation_hook(__FILE__, 'activate_astropix_apod');

/**
 * Plugin deactivation
 */
function deactivate_astropix_apod()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-astropix-apod-deactivator.php';
	Astropix_Apod_Deactivator::deactivate();
}

// Register plugin deactivation fucntion
register_deactivation_hook(__FILE__, 'deactivate_astropix_apod');

/**
 * Plugin render
 */
function astropix_apod_render($atts, $content, $tag)
{
	return Astropix_Apod_Rss::astropix_apod_render($atts, $content, $tag);
}

// Create shortcode to render plugin output
add_shortcode('astropix-apod', 'astropix_apod_render');

/**
 * Begins execution of the plugin
 */
function run_astropix_apod()
{
	$plugin = new Astropix_Apod();
	$plugin->run();
}

// Go!
run_astropix_apod();
