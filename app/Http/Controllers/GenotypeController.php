<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genotype;

class GenotypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genotypes = Genotype::all();

        return view('genotypes.index', compact('genotypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genotypes.create');
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
            'title'=>'required',
            'description'=>'required'
        ]);

        $genotype = new Genotype([
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ]);
        $genotype->save();
        return redirect('/genotypes')->with('success', 'Genotype saved!');
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
        $genotype = Genotype::find($id);
        return view('genotypes.edit', compact('genotype'));  
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
            'title'=>'required',
            'description'=>'required'
        ]);

        $genotype = Genotype::find($id);
        $genotype->title =  $request->get('title');
        $genotype->description = $request->get('description');
        $genotype->save();
        return redirect('/genotypes')->with('success', 'Genotype updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genotype = Genotype::find($id);
        $genotype->delete();

        return redirect('/genotypes')->with('success', 'Genotype deleted!');
    }
}
