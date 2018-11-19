<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'company_id',
        'user_id',
        'days'
    ];

    //a project belong to many users
    public function users(){
        return $this->belongsToMany('App\User');
    }
    
    //a project belong to single company
    public function company(){
        return $this->belongsTo('App\Company');
    }

    //polymorphic relationship with comments
    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

    
}
