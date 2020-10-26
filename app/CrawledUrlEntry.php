<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrawledUrlEntry extends Model
{
    protected $fillable = [
    	'image',
    	'type',
    	'price',
    	'price_per_meter',
    	'currency',
    	'space',
    	'place',
    	'description'
    ];

    public function crawled_url(){
    	return $this->hasOne('App\CrawledUrl');
    }
}
