<?php

/**
 * 
 * https://apod.nasa.gov/apod.rss"
 * 
 */

require plugin_dir_path( __FILE__ ) . '/lib.php';

class Astropix_Apod_Rss {

    public static function astropix_apod_render($atts, $content, $tag) {
        $rss_data = get_rss_data($atts['rss_url']);

        $html = "";
         
        return $html;
    }
}