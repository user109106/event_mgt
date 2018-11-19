<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'city',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //a user belong to single role
    public function role(){
        return $this->belongsTo('App\Role');
    }
    //a user has many companies
    public function companies(){
        return $this->hasmany('App\Company');
    }
    
    //a user belong to many tasks
    public function tasks(){
        return $this->belongsToMany('App\Task');
    }

    //many to many relationship
    //a user belongs to many projects
    public function projects(){
        return $this->belongsToMany('App\Project');
    }

    //a user has many comments
    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
}
