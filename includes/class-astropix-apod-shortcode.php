<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.riccardogiovarelli.it/
 * @since      1.0.0
 *
 * @package    Astropix_Apod
 * @subpackage Astropix_Apod/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Astropix_Apod
 * @subpackage Astropix_Apod/includes
 * @author     Riccardo Giovarelli <riccardo.giovarelli@gmail.com>
 */
class Astropix_Apod_Shortcode {

    private static function get_rss_data() {
        https://apod.nasa.gov/apod.rss
    }

    public static function astropix_apod_render($atts, $content, $tag) {
        $Content = "<style>\r\n";
        $Content .= "h3.demoClass {\r\n";
        $Content .= "color: #26b158;\r\n";
        $Content .= "}\r\n";
        $Content .= "</style>\r\n";
        $Content .= '<h3 class="demoClass">Check it out!</h3>';
         
        return $Content;
    }
}