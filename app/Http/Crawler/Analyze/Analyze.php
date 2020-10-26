<?php

namespace App\Http\Crawler\Analyze;

use App\Http\Crawler\Curl\Curl;
use App\Http\Crawler\Interfaces\AnalyzeInterface;
use \DOMDocument;
use \DOMXpath;

/**
 * 
 */
abstract class Analyze implements AnalyzeInterface
{
	
	protected $dom;
	protected $xpath;
	protected $result;

	abstract protected function analyze();

	public function __construct(Curl $curl){

		// Create dom element
		$this->dom = new DOMDocument();

		// Set error handling
		libxml_use_internal_errors (true);

		// Load curl response as html
		$this->dom->loadHTML(mb_convert_encoding($curl->getResult(), 'HTML-ENTITIES', "UTF-8"));

		// Create xpath element
		$this->xpath = new DOMXpath($this->dom);

		// Analyze
		$this->analyze();
	}

	public function skipCrawledUrls(){
		$crawledUrl = \App\CrawledUrl::WhereIn('url', $this->result)->pluck('url')->toArray();
		return array_diff($this->result, $crawledUrl);
	}

	public function getResult(){
		return $this->result;
	}

}