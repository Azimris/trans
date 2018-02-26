<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password','slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function following()
    {
        return $this->belongsToMany(User::class, 'connections', 'follower_id', 'following_id')
            ->withPivot('status')->withTimestamps();
    }
    public function follower()
    {
        return $this->belongsToMany(User::class, 'connections','following_id','follower_id')
            ->withPivot('status')->withTimestamps();
    }
}
