<?php

namespace App\Http\Controllers;

use App\Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ADMINCourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Auth::check() && Auth()->user()->role == 'admin') {
            $courrier = Courrier::all();
            return view('admin_index', compact('courrier'));
        }
        else
            return view('login') -> with('Warning!', 'login first to get to this page.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(Auth::check() && Auth()->user()->role == 'admin') {
            $courrier = Courrier::all();
            return view('create');
        }
        else
            return view('login') -> with('Warning!', 'login first to get to this page.');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'sender' => 'required|max:255',
            'receiver' => 'required|max:255',
            'subject' => 'required|max:255',
            'corps' => 'required|max:500',
            'comments' => 'max:500',
            'object' => 'required|max:255',
            'treater' => 'required|max:255',
            'urgency' => 'required|numeric',
            'status' => 'required|numeric',
            'receptionDate' => 'required|date',
        ]);
        Courrier::create($storeData);

        return redirect('/courriers_admin')->with('completed', 'Courrier has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        // get the courrier
        $courrier = Courrier::findOrFail($id);

        // show the view and pass the nerd to it
        return view('show', compact('courrier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        if(Auth::check() && Auth()->user()->role == 'admin') {
            $courrier = Courrier::findOrFail($id);
            return view('admin_edit', compact('courrier'));
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
        return redirect('/courriers_admin')->with('completed', 'Courrier has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        if(Auth::check() && Auth()->user()->role == 'admin') {
            $courrier = Courrier::findOrFail($id);
            $courrier->delete();

            return redirect('/courriers_admin')->with('completed', 'Courrier has been deleted');
        }
        else
            return view('login') -> with('Warning!', 'login first to get to this page.');

    }
}