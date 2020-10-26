<?php

namespace App\Http\Crawler;

use App\Source;
use App\UserPreference;
use App\Http\Crawler\Curl\Curl;
use App\Http\Crawler\Rating\Rating;

class Crawler {

	protected $userId;
	protected $user;
	protected $sources;
	protected $userPreferences;

	public function __construct(){
		$this->setUserId();
		$this->setUser();
		$this->setUserPreferences();
		$this->setSources();
	}

	public function start(){

		// Start iteration for all sources
		foreach($this->sources as $source){

			// Generate crawl url
			$baseUrl = new $source->class_generate_base_url($source);

			// Craw current source
			$baseUrlResult = new Curl($baseUrl);
			
			// Analyze response and collect url links
			$analyzedUrls = new $source->class_url_analyze($baseUrlResult);

			foreach($analyzedUrls->skipCrawledUrls() as $url){

				// Craw url links
				$contentResult = new Curl(new $source->class_generate_link_url($url));

				// Analyze response data
				$analyzedRezult = new $source->class_content_analyze($contentResult);

				// Rate data
				$rating = new Rating($analyzedRezult, $this->userPreferences);

				// Store url and data
			}
		} // End iteration for all sources

	}

	protected function setUserId(){
		$this->userId = \Auth::id();
	}

	public function getUserId(){
		return $this->userId;
	}

	protected function setUser(){
		$this->user = \Auth::user();
	}

	public function getUser(){
		return $this->user;
	}

	protected function setUserPreferences(){
		$this->userPreferences = UserPreference::where('user_id', '=', $this->userId)->get();
	}

	public function getUserPreferences(){
		return $this->userPreferences;
	}

	protected function setSources(){
		$this->sources = Source::where('active', '=', 1)->get();
	}

	public function getSources(){
		return $this->sources;
	}

}