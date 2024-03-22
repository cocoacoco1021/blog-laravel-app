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
    // protected $fillable = [
    //     'first_name', 'last_name', 'email', 'password' 'avatar',
    // ];

    protected $guarded =['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function followers(){

        //Getting all followers of this User
        // return $this->belongsToMany('App\User', 'relationships', 'followed_id', 'follower_id')->withTimestamps();
        return $this->belongsToMany('App\User', 'relationships', 'followed_id', 'follower_id');
    }

    public function followedUsers()
    {
        //Getting all the users being followedby this User
        return $this->belongsToMany('App\User', 'relationships', 'follower_id', 'followed_id');
    }

    public function isFollowing($followed_id){

        return $this->followedUsers()->where('followed_id', $followed_id)->exists();
        // return $this->followedUsers()->where('followed_id', $user->id)->exists();
    }

    public function isFollowed($follower_id){

        return $this->followers()->where('follower_id', $follower_id)->exists();
    }

}
