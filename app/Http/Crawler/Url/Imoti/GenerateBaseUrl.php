<?php

namespace App\Http\Crawler\Url\Imoti;

use App\Http\Crawler\Url\GenerateUrl;

/**
 * Generate url address from source
 */
class GenerateBaseUrl extends GenerateUrl
{

	protected $sleep = false;

	protected function setSource($source){
		if(is_a($source, 'App\Source')){
			$this->source = $source;
		}
	}

	protected function setBaseUrl(){
		if($this->isValidUrl($this->source->base_url)){
			$this->baseUrl = $this->source->base_url;
		}
	}

	protected function createUrl(){

		$pieces = [
			'url' => '/bg/adv/act:sell',
			'low_price' => '/price_from:40000',
			'high_price' => '/price_to:90000',
			'currency' => '/currency:EUR',
			'oblast' => '/oblast:plovdiv',
			'city' => '/cities:2982',
			'area_from' => '/area_from:75',
			'area_to' => '/area_to:150',
			'keywords' => '/keywords:',
			'pics' => '/pic:all',
			'options' => '/options:YTowOnt9',
			'types' => '/types:YTo1OntpOjA7czoxMzoiMDgzM2JiMWI4OTNiNyI7aToxO3M6MTM6IjI4YTgyODM0NzUyY2MiO2k6MjtzOjEzOiI0MzZhZGYzYWEzNDNmIjtpOjM7czoxMzoiOWU1MDliZDAxZTFiMiI7aTo0O3M6MTM6IjFkMTJiZGQ3NDA2YjIiO30=',
			'quarters' => '/quarters:YTo0OntpOjA7czoxMzoiMmRjNjNhNjBlYjY4ZCI7aToxO3M6MTM6ImU3Y2IwMWUxYzQ2ODQiO2k6MjtzOjEzOiJiOTA0NmQ2YjA1ZDg1IjtpOjM7czoxMzoiOTU4MDEwY2NkNWUzNiI7fQ==',
		];

		$this->url = $this->getBaseUrl().implode('', $pieces);
	}
	
}