<?php

namespace App\Http\Controllers;

use App\Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BOCourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check() && Auth()->user()->role == 'bo') {
            $courrier = Courrier::all();
            return view('IN.index', compact('courrier'));
        } else
            return view('IN.login')->with('Warning!', 'login first to get to this page.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('IN.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if (Auth::check() && Auth()->user()->role == 'bo') {
            $storeData = $request->validate([
                'expediteur' => 'required|max:255',
                'recepteur' => 'required|max:255',
                'sujet' => 'required|max:255',
                'corps' => 'max:500',
                'type' => 'max:5',
                'traiterPar' => 'max:255',
                'commentaires' => 'max:500',
                'objet' => 'required|max:255',
                'urgence' => 'required|numeric',
                'statut' => 'required|numeric',
                'dateReception' => 'required|date',
            ]);
            $traits = $request->input('traiterPar');
            $string = '';
            if (isset($traits))
                foreach ($traits as $trait) {
                    $string .= $trait;
                    $string .= ',';
                }

            $storeData['traiterPar'] = $string;
            Courrier::create($storeData);

            return redirect('/courriers_bo')->with('completed', 'Courrier has been saved!');
        } else
            return view('IN.login')->with('Warning!', 'login first to get to this page.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        if (Auth::check() && Auth()->user()->role == 'bo') {
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
        if (Auth::check() && Auth()->user()->role == 'bo') {
            $courrier = Courrier::findOrFail($id);
            return view('IN.edit', compact('courrier'));
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
        if (Auth::check() && Auth()->user()->role == 'bo') {
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
            Courrier::whereId($id)->update($updateData);
            return redirect('/courriers_bo')->with('completed', 'Courrier has been updated');
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
        return redirect('/courriers_bo')->with('warning', 'You don\'t have permission to get there!');
    }
}
