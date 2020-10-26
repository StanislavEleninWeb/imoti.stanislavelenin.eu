<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrawledUrlRating extends Model
{
    protected fillable = [
    	'rating',
    	'rating_price',
    	'rating_price_per_meter',
    	'rating_space',
    	'rating_keywords'
    ];

    protected $timestamp = false;

    public function crawled_url(){
    	return $this->hasOne('App\CrawledUrl');
    }
}
