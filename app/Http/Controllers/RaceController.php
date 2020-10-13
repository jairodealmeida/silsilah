<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $races = Race::all();

        return view('races.index', compact('races'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('races.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);

        $race = new Race([
            'name' => $request->get('name'),
            'specie' => $request->get('specie'),
            'genotype' => $request->get('genotype'),
            'origin' => $request->get('origin'),
            'description' => $request->get('description')
        ]);
        $race->save();
        return redirect('/races')->with('success', 'Race saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $race = Race::find($id);
        return view('races.edit', compact('race'));  
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
        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);

        $race = Race::find($id);
        $race->name =  $request->get('name');
        $race->specie = $request->get('specie');
        $race->genotype = $request->get('genotype');
        $race->origin = $request->get('origin');
        $race->description = $request->get('description');
        $race->save();
        return redirect('/races')->with('success', 'Race updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $race = Race::find($id);
        $race->delete();

        return redirect('/races')->with('success', 'Race deleted!');
    }
}
