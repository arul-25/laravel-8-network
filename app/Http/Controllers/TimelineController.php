<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $following = Auth::user()->follows->pluck('id');

        // $statuses = Status::where('user_id', Auth::user()->id)->get();
        // $statuses = Auth::user()->status;

        // $statuses = Status::whereIn('user_id', $following)->orWhere('user_id', Auth::user()->id)->latest()->get();
        $statuses = Auth::user()->timeline();
        return view('timeline', compact('statuses'));
    }
}
