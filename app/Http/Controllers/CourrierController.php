<?php

namespace App\Http\Controllers;

use App\Courrier;
use Illuminate\Http\Request;

class CourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courrier = Courrier::all();
        return view('index', compact('courrier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

        return redirect('/courriers')->with('completed', 'Courrier has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courrier = Courrier::findOrFail($id);
        return view('edit', compact('courrier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        return redirect('/courriers')->with('completed', 'Courrier has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courrier = Courrier::findOrFail($id);
        $courrier->delete();

        return redirect('/courriers')->with('completed', 'Courrier has been deleted');
    }
}
