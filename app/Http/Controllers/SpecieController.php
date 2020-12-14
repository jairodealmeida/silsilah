<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specie;
use Ramsey\Uuid\Uuid;
class SpecieController  extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $species = Specie::all();

        return view('species.index', compact('species'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $classes = array(
            'mammals' => 'Mamíferos',
            'birds' =>'Aves',
            'reptiles'=>'Répteis',
            'amphibians'=>'Anfíbios',
            'pisces'=>'Peixes',
            'invertebrates'=>'Invertebrados'
        );
        return view('species.create',  compact('classes'));
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

        $specie = new Specie([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'classe' => $request->get('classe')
        ]);
        $specie->save();
        return redirect('/species')->with('success', 'Specie saved!');
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
        
        $classes = array(
            'mammals' => 'Mamíferos',
            'birds' =>'Aves',
            'reptiles'=>'Répteis',
            'amphibians'=>'Anfíbios',
            'pisces'=>'Peixes',
            'invertebrates'=>'Invertebrados'
        );
        $specie = Specie::find($id);
        return view('species.edit', compact('specie','classes'));  
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

        $specie = Specie::findOrFail($id);
        $specie->title =  $request->get('title');
        $specie->description = $request->get('description');
        $specie->classe = $request->get('classe');
        $specie->save();
        return redirect('/species')->with('success', 'Specie updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specie = Specie::findOrFail($id);
        $specie->delete();

        return redirect('/species')->with('success', 'Specie deleted!');
    }
}
