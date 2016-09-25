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
        'name', 'email', 'password',
    ];

    /**
     * Get the photos for a user
     *
     * @return hasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'author_id');
    }


    /**
     * Get the friends for a user
     *
     * @return belongsToMany
     */
    public function friends()
    {
        return $this->belongsToMany(User::class, 'friend_user', 'user_id', 'friend_id')->withTimestamps();
    }

    public function getIsFriendAttribute()
    {
        return request()->user()->friends()->get()->contains($this);
    }

    public function addFriend(User $friend)
    {
        $this->friends()->attach($friend);
    }

    public function deleteFriend(User $friend)
    {
        $this->friends()->detach($friend);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
