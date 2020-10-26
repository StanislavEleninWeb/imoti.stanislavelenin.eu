<?php

namespace App\Http\Crawler\Curl;

use App\Http\Crawler\Url\GenerateUrl;
use App\Http\Crawler\Interfaces\UrlInterface;

class Curl
{

	protected $ch;
	protected $url;
	protected $result;
	protected $user_agent = [
		'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) ',
		'Chrome/57.0.2987.133 Safari/537.36',
		'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0; Trident/5.0)',
		'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)',
		'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299',
		'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0',
		'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)',
		'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko)',
		'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; .NET CLR 3.0.04506)',
		'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
		'Microsoft Office/14.0 (Windows NT 6.1; Microsoft Outlook 14.0.7143; Pro)',
		'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36',
	];
	protected $default_options = [
		CURLOPT_HEADER => false,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FAILONERROR => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_TIMEOUT => 20,
		CURLOPT_REFERER => true,
		CURLOPT_FOLLOWLOCATION => true,
	];

	public function __construct(UrlInterface $url){
		$this->url = $url->getUrl();
		$this->createCurl();
		$this->setCurlOptions($url->getCurlOptions(), $url->getOverrideDefaultOptions());
		$this->result = $this->executeCurl();
		$this->sleepTime($url->getSleep());

		if($this->getErrno()){
			$this->result = $this->getError();
		}

		$this->closeCurl();

		return $this->result;
	}

	protected function createCurl(){
		$this->ch = curl_init($this->url);
	}

	public function getResult(){
		return $this->result;
	}

	protected function getError(){
		return curl_error($this->ch);
	}

	protected function getErrno(){
		return curl_errno($this->ch);
	}

	protected function setCurlOptions($options, $override_default_options){
		if($override_default_options === true){

		} else {
			if(count($options)){
				$options = array_merge($this->default_options, $options);
			} else {
				$options = $this->default_options;
			}
			$options[CURLOPT_USERAGENT] = array_rand($this->user_agent);
		}

		curl_setopt_array($this->ch, $options);
	}

	protected function executeCurl(){
		return curl_exec($this->ch);
	}

	protected function closeCurl(){
		curl_close($this->ch);
	}

	protected function sleepTime($sleep){
		if($sleep){
			sleep(rand(0,7));
		}
	}

}
