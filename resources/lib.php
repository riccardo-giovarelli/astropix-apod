<?php

function get_rss_data($url) {

    $rss_content = file_get_contents($url);
    if ($rss_content === false) return false;

    return '';
}