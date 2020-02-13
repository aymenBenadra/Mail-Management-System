<?php

namespace App\Http\Controllers;

use App\Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DVCourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check() && Auth()->user()->role == 'dv') {
            $courrier = Courrier::all();
            return view('index', compact('courrier'));
        } else
            return view('login')->with('Warning!', 'login first to get to this page.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function archive()
    {
        if (Auth::check() && Auth()->user()->role == 'dv') {
            $courrier = Courrier::all();
            return view('archive', compact('courrier'));
        } else
            return view('login')->with('Warning!', 'login first to get to this page.');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return redirect('/courriers_dv')->with('warning', 'You don\'t have permission to get there!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        if (Auth::check() && Auth()->user()->role == 'dv') {
            // get the courrier
            $courrier = Courrier::findOrFail($id);

            // show the view and pass the nerd to it
            return view('show', compact('courrier'));
        } else
            return view('login')->with('Warning!', 'login first to get to this page.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        if (Auth::check() && Auth()->user()->role == 'dv') {
            $courrier = Courrier::findOrFail($id);
            return view('edit', compact('courrier'));
        } else
            return view('login')->with('Warning!', 'login first to get to this page.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        if (Auth::check() && Auth()->user()->role == 'dv') {
            $updateData = $request->validate([
                'traitement' => 'required|max:500',
            ]);
            Courrier::whereId($id)->update($updateData);
            return redirect('/courriers_dv')->with('completed', 'Courrier has been updated');
        } else
            return view('login')->with('Warning!', 'login first to get to this page.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        return redirect('/courriers_dv')->with('warning', 'You don\'t have permission to get there!');
    }
}
