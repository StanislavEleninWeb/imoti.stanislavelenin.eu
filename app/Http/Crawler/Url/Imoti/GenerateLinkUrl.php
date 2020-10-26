<?php

namespace App\Http\Crawler\Url\Imoti;

use App\Http\Crawler\Url\GenerateUrl;

/**
 * Generate Valid Url address From links
 */
class GenerateLinkUrl extends GenerateUrl
{
	protected function setSource($source){
		$this->source = $source;
	}

	protected function setBaseUrl(){
		if($this->isValidUrl($this->source)){
			$parseUrl = parse_url($this->source);
			$this->baseUrl = $parseUrl['scheme'].'://'.$parseUrl['host'];
		}
	}

	protected function createUrl(){
		$this->url = $this->source;
	}
}