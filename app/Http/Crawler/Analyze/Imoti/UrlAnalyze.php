<?php

namespace App\Http\Crawler\Analyze\Imoti;

use App\Http\Crawler\Analyze\Analyze;

/**
 * 
 */
class UrlAnalyze extends Analyze
{
	protected function analyze(){
		$elements = $this->xpath->query("//div[@class='desc']/div[@class='listAdv']/div[@class='box']/a");
		foreach($elements as $element){
			$this->result[] = $element->getAttribute('href');
		}
	}
}