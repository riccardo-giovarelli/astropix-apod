<?php

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


function get_apod_html($rss_data) {
    $html = '';
    $html .= '<div class="apod_container">';
        switch (true) {
            case(isset($rss_data['image'])):
                $html .= '<img src="' . $rss_data['image'] . '" alt="' . $rss_data['alt_text'] . '">';
                break;
            case(isset($rss_data['video'])):
                $html .= '<iframe src="' . $rss_data['video'] . '" height="315" title="' . $rss_data['alt_text'] . '">';
                $html .= '</iframe>';
                break;
            default:
                $html .= '<div>' . $rss_data['alt_text'] . '</div>';
                break;
        }
        $html .= '<div>';
            $html .= !empty($rss_data['alt_text']) ? $rss_data['alt_text'] : __( 'no-content-from-rss', 'astropix-apod' );
        $html .= '</div>';
    $html .= '</div>';

    return $html;
}