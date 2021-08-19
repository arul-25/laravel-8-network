<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UpdateProfileInformationController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        $attribute = $request->validate([
            'name' => ['required', 'min:3', 'max:191', 'string'],
            'email' => ['email', 'string', 'min:3', 'max:191', 'required'],
            'username' => ['required', 'alpha_num', 'unique:users,username,' . Auth::id()]
        ]);

        Auth::user()->update($attribute);

        return back()->with('message', 'Your Profile has Been Updated');
    }
}
