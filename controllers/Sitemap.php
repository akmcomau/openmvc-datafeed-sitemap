<?php

namespace modules\datafeed_sitemap\controllers;

use core\classes\Model;
use core\classes\renderable\Controller;

class Sitemap extends Controller {

	public function getAllUrls($include_filter = NULL, $exclude_filter = NULL) {
		return [];
	}

	public function index() {
		$urls = [];
		foreach ($this->url->getUrlMap()['forward'] as $name => $data) {
			$class = $this->url->getControllerClass($name);
			if (!preg_match('/\\\\controllers\\\\administrator\\\\/', $class)) {
				$controller = new $class($this->config, $this->database);
				$urls = array_merge($urls, $controller->getAllUrls());
			}
		}

		$xml  = '<?xml version="1.0" encoding="UTF-8"?>';
		$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		foreach ($urls as $url) {
			$xml .= '<url>';
			$xml .=   '<loc>'.$url['url'].'</loc> ';
			$xml .= '</url>';
		}
		$xml .= '</urlset>';

		$this->response->setXmlContent($this, $xml);
	}
}