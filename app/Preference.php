<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'type', 
        'active',
    ];

    public function users(){
        return $this->belongsToMany('App\User', 'user_preferences')->withPivot('value')->withTimestamps();;
    }
}
