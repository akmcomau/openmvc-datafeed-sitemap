<?php

namespace modules\datafeed_sitemap;

use ErrorException;
use core\classes\Config;
use core\classes\Database;
use core\classes\Language;
use core\classes\Model;
use core\classes\Menu;

class Installer {
	protected $config;
	protected $database;

	public function __construct(Config $config, Database $database) {
		$this->config = $config;
		$this->database = $database;
	}

	public function install() {
	}

	public function uninstall() {
	}

	public function enable() {
	}

	public function disable() {
	}
}