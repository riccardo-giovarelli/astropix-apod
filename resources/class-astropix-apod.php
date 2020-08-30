<?php

require plugin_dir_path( __FILE__ ) . '/lib.php';


class Astropix_Apod_Rss {

    private static $rss_url = "https://apod.nasa.gov/apod.rss";
    private static $base_url = "https://apod.nasa.gov/apod/";

    public static function astropix_apod_render($atts, $content, $tag) {

        $rss_data = get_rss_data(Astropix_Apod_Rss::$rss_url, Astropix_Apod_Rss::$base_url);

        $html = get_apod_html($rss_data);
         
        return $html;
    }
}