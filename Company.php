<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'user_id'
    ];

    //a company belong to single user
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function projects(){
        return $this->hasMany('App\Project');
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
}
