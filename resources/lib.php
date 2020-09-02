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
 * @param   string  $rss_url    Url of the rss feed
 * @param   string  $base_url   Url base of the site Astronomy Picture of the Day by Nasa
 * 
 * @return  array   Informations about picture of the day
 */
function get_rss_data($rss_url, $base_url) {

    // Regex
    $page_regex = '/href="(?<page_url>[^\"]+)"/i';
    $img_regex = '/img\s*src="(?<img_url>[^\"]+)"/i';
    $video_regex = '/<iframe\s*width="[0-9]+"\s*height="[0-9]+"\s*src="(?<video_url>[^"]+)"/i';
    $alt_text = '/alt="(?<alt_text>[^\"]+)"/i';

    // Get rss content
    $rss_content = file_get_contents($rss_url);
    if ($rss_content === false) return false;

    // Get last post url
    if (preg_match_all($page_regex, $rss_content, $matched_page_url) === false) return false;
    $result['post_url'] = reset($matched_page_url['page_url']);

    // Get page content
    $page_content = file_get_contents(reset($matched_page_url['page_url']));
    if ($page_content === false) return false;

    // Get image url
    if (preg_match_all($img_regex, $page_content, $matched_image_url) > 0) {
        $result['image'] = $base_url . reset($matched_image_url['img_url']);
    } else if (preg_match_all($video_regex, $page_content, $matched_video_url) > 0) {
        $result['video'] = reset($matched_video_url['video_url']);
    } else {
        return false;
    }

    // Get image alt text
    $result['alt_text'] = preg_match_all($alt_text, $rss_content, $matched_alt_text) === false ? 
        'Astronomy Picture of the Day' : 
        reset($matched_alt_text['alt_text']);

    return $result;
}

/**
 * @param   string  $rss_data    Informations about picture of the day
 * 
 * @return  array   Html for shortcode
 */
function get_apod_html($rss_data) {

    wp_enqueue_style("astropix-apod-style", plugins_url("astropix-apod/css/style.css"), array(), time(), "all");

    $title = "NASA - Astronomy Picture of the Day";

    $html = '';
    $html .= '<div class="apod_container">';
    $html .= '<div class="apod_title" title="' . $title . '">';
        $html .= $title;
    $html .= '</div>';
    $html .= '<div class="apod_media">';
        switch (true) {
            case(isset($rss_data['image'])):
                $html .= '<img src="' . $rss_data['image'] . '" alt="' . __( 'Picture of the day', 'astropix-apod' ) . '">';
                break;
            case(isset($rss_data['video'])):
                $html .= '<iframe src="' . $rss_data['video'] . '" height="315" title="' . __( 'No content available today', 'astropix-apod' ) . '">';
                $html .= '</iframe>';
                break;
            default:
                $html .= '<div>' . $rss_data['alt_text'] . '</div>';
                break;
        }
    $html .= '</div>';
        $html .= '<div class="apod_label">';
            $html .= !empty($rss_data['alt_text']) ? $rss_data['alt_text'] : __( 'No content available today', 'astropix-apod' );
        $html .= '</div>';
        $html .= '<div class="apod_page_url">';
            $html .= !empty($rss_data['post_url']) ? get_link_code($rss_data['post_url']) : __( 'Video of the day', 'astropix-apod' );
        $html .= '</div>';
    $html .= '</div>';

    return $html;
}

/**
 * @param   string  $url    Url of the page
 * 
 * @return  array   Html for page link
 */
function get_link_code($url) {
    $html = '';
    $html .= __( 'To see the original post click', 'astropix-apod' );
    $html .= ' ';
    $html .= '<a href="' . $url . '" target="_blank">';
    $html .= __( 'here', 'astropix-apod' );
    $html .= '</a>';
    return $html;
}