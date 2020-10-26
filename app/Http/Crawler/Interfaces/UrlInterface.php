<?php

namespace App\Http\Crawler\Interfaces;

interface UrlInterface {
	public function getUrl():string;
	public function getBaseUrl():string;
	public function getTypeRequest():string;
	public function getCurlOptions():array;
	public function getSleep():bool;
	public function getOverrideDefaultOptions():bool;
	public function isValidUrl($url):bool;
}