<?php

namespace App\Traits;

use App\Models\User;
use Auth;

trait Following
{
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withTimestamps();
    }


    public function follow(User $user)
    {
        if (Auth::user()->id == $user->id) return false;
        return $this->follows()->save($user);
    }

    public function hasFollow(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }
}
