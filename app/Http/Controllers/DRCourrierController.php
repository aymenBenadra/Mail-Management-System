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
        if (Auth::check() && Auth()->user()->role == 'dr') {
            $courrier = Courrier::all();
            return view('IN.index', compact('courrier'));
        } else
            return view('IN.login')->with('Warning!', 'login first to get to this page.');
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
        if (Auth::check() && Auth()->user()->role == 'dr') {
            // get the courrier
            $courrier = Courrier::findOrFail($id);
            // show the view and pass the nerd to it
            return view('IN.show', compact('courrier'));
        } else
            return view('IN.login')->with('Warning!', 'login first to get to this page.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        if (Auth::check() && Auth()->user()->role == 'dr') {
            $courrier = Courrier::findOrFail($id);
            return view('IN.edit', compact('courrier'));
        } else
            return view('IN.login')->with('Warning!', 'login first to get to this page.');
    }

    /**
     * Cloture the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cloture($id)
    {
        if (Auth::check() && Auth()->user()->role == 'admin') {
            $courrier = Courrier::findOrFail($id);
            return view('IN.update', compact('courrier'));
        } else
            return view('IN.login')->with('Warning!', 'login first to get to this page.');
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
        if (Auth::check() && Auth()->user()->role == 'dr') {
            $updateData = $request->validate([
                'expediteur' => 'required|max:255',
                'recepteur' => 'required|max:255',
                'sujet' => 'required|max:255',
                'corps' => 'max:500',
                'type' => 'max:5',
                'commentaires' => 'max:500',
                'objet' => 'required|max:255',
                'traiterPar' => 'max:255',
                'urgence' => 'required|numeric',
                'statut' => 'required|numeric',
                'dateReception' => 'required|date',
            ]);
            $traits = $request->input('traiterPar');
            $string = '';
            if (!empty($traits))
                foreach ($traits as $trait) {
                    $string .= $trait;
                    $string .= ',';
                }

            $updateData['traiterPar'] = $string;
            Courrier::whereId($id)->update($updateData);
            return redirect('/courriers_dr')->with('completed', 'Courrier has been updated');
        } else
            return view('IN.login')->with('Warning!', 'login first to get to this page.');
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
