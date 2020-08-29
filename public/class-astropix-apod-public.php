<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.riccardogiovarelli.it/
 * @since      1.0.0
 *
 * @package    Astropix_Apod
 * @subpackage Astropix_Apod/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Astropix_Apod
 * @subpackage Astropix_Apod/public
 * @author     Riccardo Giovarelli <riccardo.giovarelli@gmail.com>
 */
class Astropix_Apod_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $astropix_apod    The ID of this plugin.
	 */
	private $astropix_apod;

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
	 * @param      string    $astropix_apod       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $astropix_apod, $version ) {

		$this->astropix_apod = $astropix_apod;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Astropix_Apod_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Astropix_Apod_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->astropix_apod, plugin_dir_url( __FILE__ ) . 'css/astropix-apod-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Astropix_Apod_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Astropix_Apod_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->astropix_apod, plugin_dir_url( __FILE__ ) . 'js/astropix-apod-public.js', array( 'jquery' ), $this->version, false );

	}

}
