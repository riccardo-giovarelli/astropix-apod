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
 * The core plugin class.
 */
class Astropix_Apod
{
	protected $loader;
	protected $astropix_apod;
	protected $version;

	/**
	 * Class constructor
	 */
	public function __construct()
	{
		if (defined('PLUGIN_ASTROPIX_APOD_VERSION')) {
			$this->version = PLUGIN_ASTROPIX_APOD_VERSION;
		} else {
			$this->version = '1.0.0';
		}

		$this->astropix_apod = 'astropix-apod';

		$this->load_dependencies();

		load_plugin_textdomain('astropix-apod', false, dirname(plugin_basename(__FILE__)) . '/languages/');
	}

	/**
	 * Load the required dependencies
	 */
	private function load_dependencies()
	{
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-astropix-apod-loader.php';
		$this->loader = new Astropix_Apod_Loader();
	}

	/**
	 * Run the loader to execute all of the hooks
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * Retrieve the name of the plugin
	 */
	public function get_astropix_apod()
	{
		return $this->astropix_apod;
	}

	/**
	 * Retrieve the loader
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin
	 */
	public function get_version()
	{
		return $this->version;
	}
}
