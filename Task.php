<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'project_id',
        'user_id',
        'days',
        'hours',
        'company_id'
    ];

    //a task belong to single user
    public function user(){
        return $this->belongsTo('App\User');
    }
    //a task belong to single project
    public function project(){
        return $this->belongsTo('App\Project');
    }
    //a task belong to single company
    public function company(){
        return $this->belongsTo('App\Company');
    }

    //a task belong to many users
    public function users(){
        return $this->belongsToMany('App\User');
    }

    //a user has many comments
    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
}
