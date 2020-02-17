<?php


namespace App\Http\Controllers;


use App\Courrier;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the archive of resources.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function archive()
    {
        if (Auth::check()) {
            $courrier = Courrier::all();
            return view('IN.archive', compact('courrier'));
        } else
            return view('login')->with('Warning!', 'login first to get to this page.');
    }
}
