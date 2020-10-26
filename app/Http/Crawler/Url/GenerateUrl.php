<?php

namespace App\Http\Crawler\Url;

use App\Source;
use App\Http\Crawler\Interfaces\UrlInterface;

abstract class GenerateUrl implements UrlInterface{
	
	protected $url;
	protected $source;
	protected $baseUrl;
	protected $sleep = true;
	protected $typeRequest = 'get';
	protected $curlOptions = [];	
	protected $overrideDefaultOptions = false;

	/**
	 *	Abstract class
	 */
	abstract protected function createUrl();

	/**
	 *	Set source
	 */
	abstract protected function setSource($source);

	/**
	 *	Set base url
	 */
	abstract protected function setBaseUrl();

	/**
	 * Public funciton contruct
	 */
	public function __construct($source){

		$this->setSource($source);
		$this->setBaseUrl();
		$this->createUrl();

	}

	public function getUrl():string
	{
		return $this->url;
	}

	public function getBaseUrl():string
	{
		return $this->baseUrl;
	}

	public function getTypeRequest():string
	{
		return $this->typeRequest;
	}

	public function getCurlOptions():array
	{
		return $this->curlOptions;
	}

	public function getSleep():bool
	{
		return $this->sleep;
	}

	public function getOverrideDefaultOptions():bool
	{
		return $this->overrideDefaultOptions;
	}

	public function isValidUrl($url):bool
	{
		$url = filter_var($url, FILTER_SANITIZE_URL);

		return filter_var($url, FILTER_VALIDATE_URL);
	}
}