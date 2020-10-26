<?php

namespace App\Http\Crawler\Rating;

use App\Http\Crawler\Interfaces\AnalyzeInterface;

/**
 * 
 */
class Rating
{
	protected $ratingPrice;
	protected $ratingPricePerMeter;
	protected $ratingSpace;
	protected $ratingKeywords;
	protected $rating;
	protected $preference;

	public function __construct(AnalyzeInterface $content, $preferences){
		$this->setUserPreference($preferences);
		$this->setRatingPrice($content->getPrice());
		$this->setRatingPricePerMeter($content->getPricePerMeter());
		$this->setRatingSpace($content->getSpace());
		$this->setRatingKeywords($content->getDescription());
		$this->setRating();
	}

	protected function setRatingPrice(int $price){
		$lowPrice = $this->preference['lowPrice'];
		$highPrice = $this->preference['highPrice'];
		$percentage = 100*($price-$lowPrice)/($highPrice-$lowPrice);
		$this->ratingPrice = round(10*(100-$percentage)/100, 1);
	}

	protected function setRatingPricePerMeter(float $pricePerMeter){
		$avgLowPrice =(float) 600;
		$avgHighPrice = (float) 1000;
		
		if($pricePerMeter < $avgLowPrice){
			$this->ratingPricePerMeter = 10;
		} else if($pricePerMeter > $avgHighPrice){
			$this->ratingPricePerMeter = 0;
		} else {
			$percentage = 100*($pricePerMeter-$avgLowPrice)/($avgHighPrice-$avgLowPrice);
			$this->ratingPricePerMeter = round(10*(100-$percentage)/100, 1);
		}
	}

	protected function setRatingSpace(int $space){
		$minSpace = 60;
		$maxSpace = 120;
		$percentage = 100*($space-$minSpace)/($maxSpace-$minSpace);
		$this->ratingSpace = round(10*(100-$percentage)/100, 1);
	}

	protected function setRatingKeywords($description){
		$count = 0;
		$keywords = [
			'тристаен апартамент',
			'тераса',
			'саниран',
			'гараж'
		];

		$clean_description = mb_strtolower(mb_convert_encoding($description, 'UTF-8'));

		foreach($keywords as $keyword){
			if(mb_strpos($clean_description, $keyword) !== false){
				$count++;
			}
		}

		if(!empty($count)){
			$percentage = 100*$count/count($keywords);
			$this->ratingKeywords = round(10*$percentage/100, 1);
		} else {
			$this->ratingKeywords = 0;
		}
	}

	protected function setRating(){
		$this->rating = round((
			$this->ratingPrice + 
			$this->ratingPricePerMeter + 
			$this->ratingSpace + 
			$this->ratingKeywords
		)/4, 1);
	}

	protected function setUserPreference($preferences){
		foreach ($preferences as $itr) {
			$this->preference[$itr->preference_id] = $itr->value;
		}
	}

	public function getRatingPrice(){
		return $this->ratingPrice;
	}

	public function getRatingPricePerMeter(){
		return $this->ratingPricePerMeter;
	}

	public function getRatingSpace(){
		return $this->ratingSpace;
	}

	public function getRatingKeywords(){
		return $this->ratingKeywords;
	}

	public function getRating(){
		return $this->rating;
	}
}