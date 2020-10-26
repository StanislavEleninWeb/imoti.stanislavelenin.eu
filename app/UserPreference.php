<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    protected $fillable = [
    	'user_id',
    	'preference_id',
    	'value'
    ];
}
