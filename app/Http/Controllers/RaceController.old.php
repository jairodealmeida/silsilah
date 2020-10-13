<?php

namespace App\Http\Controllers;

use App\Race;
use Illuminate\Support\Facades\DB;

class RaceController extends Controller
{
    public function index()
    {
        $races = $this->getAll();

        return view('race.index', compact('races'));
    }
    public function show(Race $race)
    {
        return view('race.show', compact('race'));
    }
    public function edit(Race $race)
    {
        $this->authorize('edit', $race);

        return view('races.edit', compact('race'));
    }
    public function update(race $race)
    {
        $this->authorize('edit', $race);

        /*$raceData = request()->validate([
            'marriage_date' => 'nullable|date|date_format:Y-m-d',
            'divorce_date'  => 'nullable|date|date_format:Y-m-d',
        ]);

        $race->marriage_date = $raceData['marriage_date'];
        $race->divorce_date = $raceData['divorce_date'];*/
        $race->save();

        return redirect()->route('races.show', $race);
    }
    private function getAll()
    {
        $races = Race::all();
        return $races;
    }
    
    private function register()
    {
        $races = Race::all();
        return $races;
    }
   
}
