<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'base_url',
        'active',
        'class_generate_base_url',
        'class_generate_link_url',
        'class_url_analyze',
        'class_content_analyze'
    ];
}
