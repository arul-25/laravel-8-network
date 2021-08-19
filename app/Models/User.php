<?php

namespace App\Models;

use App\Traits\Following;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Following;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function status()
    {
        return $this->hasMany(Status::class);
    }

    public function gravatar($size = 100)
    {
        $default = "mm";
        return $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=" . urlencode($default) . "&s=" . $size;
    }
    public function timeline()
    {
        $following = $this->follows->pluck('id');
        // return Status::with('user')->whereIn('user_id', $following)->orWhere('user_id', Auth::user()->id)->latest()->get();
        return Status::whereIn('user_id', $following)->orWhere('user_id', Auth::user()->id)->latest()->get();
    }
}
