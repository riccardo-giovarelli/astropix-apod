<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.riccardogiovarelli.it/
 * @since      1.0.0
 *
 * @package    Astronomy_Picture_Of_The_Day
 * @subpackage Astronomy_Picture_Of_The_Day/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Astronomy_Picture_Of_The_Day
 * @subpackage Astronomy_Picture_Of_The_Day/includes
 * @author     Riccardo Giovarelli <riccardo.giovarelli@gmail.com>
 */
class Astronomy_Picture_Of_The_Day_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'astronomy-picture-of-the-day',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
