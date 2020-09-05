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


require plugin_dir_path(__FILE__) . '/lib.php';

/**
 * Manage the rss for the plugin 
 */
class Astropix_Apod_Rss
{
    const RSS_URL = "https://apod.nasa.gov/apod.rss";
    const BASE_URL = "https://apod.nasa.gov/apod/";

    /**
     * Render the rss content
     */
    public static function astropix_apod_render()
    {
        // Get informations about picture of the day
        $rss_data = get_rss_data(self::RSS_URL, self::BASE_URL);

        // Build the html code to show
        $html = build_apod_html($rss_data);

        return $html;
    }
}
