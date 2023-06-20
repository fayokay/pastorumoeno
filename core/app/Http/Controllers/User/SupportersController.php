<?php

namespace App\Http\Controllers\User;

use App\BasicExtra;
use App\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupportersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $bex = BasicExtra::first();
        if ($bex->is_event == 0) {
            return back();
        }

        $events = Quote::where('verified', 'Yes')->where('ref',Auth::user()->id)->orderBy('id','DESC')->get();

        return view('user.supporters',compact('events'));

    }

    public function eventdetails($id)
    {
        $bex = BasicExtra::first();
        if ($bex->is_event == 0) {
            return back();
        }

        $data = Quote::findOrFail($id);

        return view('user.support_details',compact('data'));

    }
}
