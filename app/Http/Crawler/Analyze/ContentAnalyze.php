<?php

namespace App\Http\Crawler\Analyze;

use App\Http\Crawler\Analyze\Analyze;

/**
 * 
 */
abstract class ContentAnalyze extends Analyze
{

	protected $type;
	protected $price;
	protected $pricePerMeter;
	protected $currency;
	protected $space;
	protected $location;
	protected $description;


	abstract protected function setType($type);

	abstract protected function setPrice($price);

	abstract protected function setPricePerMeter($pricePerMeter);

	abstract protected function setCurrency($currency);

	abstract protected function setSpace($space);

	abstract protected function setLocation($location);

	abstract protected function setDescription($description);

	public function getType(){
		return $this->type;
	}

	public function getPrice(){
		return $this->price;
	}

	public function getPricePerMeter(){
		return $this->pricePerMeter;
	}

	public function getCurrency(){
		return $this->currency;
	}

	public function getSpace(){
		return $this->space;
	}

	public function getLocation(){
		return $this->location;
	}

	public function getDescription(){
		return $this->description;
	}

}