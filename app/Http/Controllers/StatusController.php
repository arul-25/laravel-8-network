<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use Auth;

class StatusController extends Controller
{
    public function store(StatusRequest $request)
    {
        // Status::create($request->all());
        Auth::user()->status()->create($request->validated());
        return back();
    }
}
