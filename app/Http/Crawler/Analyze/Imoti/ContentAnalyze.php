<?php

namespace App\Http\Crawler\Analyze\Imoti;

use App\Http\Crawler\Analyze\ContentAnalyze as Analyze;

/**
 * 
 */
class ContentAnalyze extends Analyze
{
	public function analyze(){

		// Get container element
		$container = $this->xpath->query('//div[@class="advDetails"]');

		// Get left desc element inside advDetails
		$leftDesc = $this->xpath->query('//div[@class="left_desc"]', $container[0]);

		// Get h2 element type, price and currency
		$typePriceCurrency = $this->xpath->query('.//h2', $leftDesc[0]);
		$this->setType($typePriceCurrency[0]->nodeValue);
		$this->setPrice($typePriceCurrency[1]->nodeValue);
		$this->setPricePerMeter($this->xpath->query('.//div[@class="price_for_meter"]', $leftDesc[0])[0]->nodeValue);
		$this->setSpace($this->xpath->query('.//table[@class="moreInfo"]/tr/td', $leftDesc[0])[1]->nodeValue);
		$this->setLocation($this->xpath->query('.//div[@class="place"]', $leftDesc[0])[0]->nodeValue);
		$this->setDescription($this->xpath->query('.//div[@class="advDesc"]', $container[0]));
	}

	protected function setType($type){
		$this->type = filter_var($type, FILTER_SANITIZE_STRING);
	}

	protected function setPrice($price){
		$arr = explode(' ', trim($price));

		$this->price = (int) $arr[0];

		$this->setCurrency($arr[1]);
	}

	protected function setPricePerMeter($pricePerMeter){
		$this->pricePerMeter = (float) filter_var( $pricePerMeter, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
	}

	protected function setCurrency($currency){
		$this->currency = mb_strtoupper(filter_var(trim($currency), FILTER_SANITIZE_STRING));
	}

	protected function setSpace($space){
		$this->space = (int) filter_var( $space, FILTER_SANITIZE_NUMBER_INT );
	}

	protected function setLocation($location){
		$this->location = filter_var($location, FILTER_SANITIZE_STRING);
	}

	protected function setDescription($description){
		$string = '';
		foreach ($description as $itr) {
			$string .= $itr->nodeValue . ' ';
		}
		$this->description = filter_var($string, FILTER_SANITIZE_STRING);
	}
}