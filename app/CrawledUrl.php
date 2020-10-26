<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrawledUrl extends Model
{
    protected $fillable = [
    	'url',
    	'source_id',
    	'viewed'
    ];

    public function source(){
    	return $this->hasOne('App\Source');
    }
}
