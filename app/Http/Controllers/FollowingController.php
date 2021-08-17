<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class FollowingController extends Controller
{

    public function index(User $user, $following)
    {
        /* if ($following == 'following') {
            $follows = $user->follows;
        } else if ($following == 'follower') {
            $follows = $user->followers;
        } else {
            return redirect(route('profile', $user->username));
        } */

        // $follows = $following == 'following' ? $user->follows : $user->followers;

        if ($following != 'follower' && $following != 'following') {
            return redirect(route('profile', $user->username));
        }

        return view('users.following', [
            'user' => $user,
            'follows' => $follows = $following == 'following' ? $user->follows : $user->followers
        ]);
    }

    // public function following(User $user)
    // {
    //     return view('users.following', [
    //         'following' => $user->follows,
    //         'user' => $user
    //     ]);
    // }

    // public function follower(User $user)
    // {
    //     return view('users.following', [
    //         'following' => $user->followers,
    //         'user' => $user
    //     ]);
    // }

    public function store(Request $request, User $user)
    {
        /*  if (Auth::user()->hasFollow($user)) {
            Auth::user()->unfollow($user);
        } else {
            Auth::user()->follow($user);
        } */

        Auth::user()->hasFollow($user) ? Auth::user()->unfollow($user) : Auth::user()->follow($user);
        return back()->with("success", 'You are follow the user');
    }
}
