<?php

namespace App\Http\Controllers;

use App\Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DRCourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Auth::check() && Auth()->user()->role == 'dr') {
            $courrier = Courrier::all();
            return view('dr_index', compact('courrier'));
        }
        else
            return view('login') -> with('Warning!', 'login first to get to this page.');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return redirect('/courriers_dr')->with('warning', 'You don\'t have permission to get there!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request){}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        if(Auth::check() && Auth()->user()->role == 'dr') {
            // get the courrier
            $courrier = Courrier::findOrFail($id);

            // show the view and pass the nerd to it
            return view('show', compact('courrier'));
        }
        else
            return view('login') -> with('Warning!', 'login first to get to this page.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        if(Auth::check() && Auth()->user()->role == 'dr') {
            $courrier = Courrier::findOrFail($id);
            return view('dr_edit', compact('courrier'));
        }
        else
            return view('login') -> with('Warning!', 'login first to get to this page.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        if(Auth::check() && Auth()->user()->role == 'dr') {
            $updateData = $request->validate([
                'sender' => 'required|max:255',
                'receiver' => 'required|max:255',
                'subject' => 'required|max:255',
                'corps' => 'required|max:500',
                'comments' => 'max:500',
                'object' => 'required|max:255',
                'treater' => 'required|max:255',
                'urgency' => 'required|numeric',
                'status' => 'required|numeric',
                'receptionDate' => 'required|date'
            ]);
            Courrier::whereId($id)->update($updateData);
            return redirect('/courriers_dr')->with('completed', 'Courrier has been updated');
        }
        else
            return view('login') -> with('Warning!', 'login first to get to this page.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        return redirect('/courriers_dr')->with('warning', 'You don\'t have permission to get there!');
    }
}
