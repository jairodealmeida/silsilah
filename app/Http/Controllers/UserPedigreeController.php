<?php

namespace App\Http\Controllers;

use LaravelQRCode\Facades\QRCode;
use App\User;
use App\Creator;
use App\Proprietary;
use App\Animal;
use App\Race;

class UserPedigreeController extends Controller
{
    public function qrcode(User $user)
    {
        return QRCode::text('http://localhost:8000/users/' . $user->id . '/pedigree')->png();   
    }

    /**
     * Show user pedigree list.
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    /*public function index(User $user)
    {
        $marriages = $user->marriages()->with('husband', 'wife')
            ->withCount('childs')->get();

        return view('users.pedigree', compact('user', 'marriages'));
    }*/
   

    public function index(User $user)
    {
       
        $father = $user->father_id ? $user->father : null;
        $mother = $user->mother_id ? $user->mother : null;
    
        $fatherGrandpa = $father && $father->father_id ? $father->father : null;
        $fatherGrandma = $father && $father->mother_id ? $father->mother : null;
        $motherGrandpa = $mother && $mother->father_id ? $mother->father : null;
        $motherGrandma = $mother && $mother->mother_id ? $mother->mother : null;

        
        $fatherBiGrandpa1 = $fatherGrandpa && $fatherGrandpa->father_id ? $fatherGrandpa->father : null;
        $fatherBiGrandma1 = $fatherGrandpa && $fatherGrandpa->mother_id ? $fatherGrandpa->mother : null;
        $motherBiGrandpa2 = $fatherGrandma && $fatherGrandma->father_id ? $fatherGrandma->father : null;
        $motherBiGrandma2 = $fatherGrandma && $fatherGrandma->mother_id ? $fatherGrandma->mother : null;
        $fatherBiGrandpa3 = $motherGrandpa && $motherGrandpa->father_id ? $motherGrandpa->father : null;
        $fatherBiGrandma3 = $motherGrandpa && $motherGrandpa->mother_id ? $motherGrandpa->mother : null;
        $motherBiGrandpa4 = $motherGrandma && $motherGrandma->father_id ? $motherGrandma->father : null;
        $motherBiGrandma4 = $motherGrandma && $motherGrandma->mother_id ? $motherGrandma->mother : null;


        $fatherTriGrandpa1 = $fatherBiGrandpa1 && $fatherBiGrandpa1->father_id ? $fatherBiGrandpa1->father : null;
        $fatherTriGrandma1 = $fatherBiGrandpa1 && $fatherBiGrandpa1->mother_id ? $fatherBiGrandpa1->mother : null;
        $motherTriGrandpa2 = $fatherBiGrandma1 && $fatherBiGrandma1->father_id ? $fatherBiGrandma1->father : null;
        $motherTriGrandma2 = $fatherBiGrandma1 && $fatherBiGrandma1->mother_id ? $fatherBiGrandma1->mother : null;
        $fatherTriGrandpa3 = $motherBiGrandpa2 && $motherBiGrandpa2->father_id ? $motherBiGrandpa2->father : null;
        $fatherTriGrandma3 = $motherBiGrandpa2 && $motherBiGrandpa2->mother_id ? $motherBiGrandpa2->mother : null;
        $motherTriGrandpa4 = $motherBiGrandma2 && $motherBiGrandma2->father_id ? $motherBiGrandma2->father : null;
        $motherTriGrandma4 = $motherBiGrandma2 && $motherBiGrandma2->mother_id ? $motherBiGrandma2->mother : null;
        $fatherTriGrandpa5 = $fatherBiGrandpa3 && $fatherBiGrandpa3->father_id ? $fatherBiGrandpa3->father : null;
        $fatherTriGrandma5 = $fatherBiGrandpa3 && $fatherBiGrandpa3->mother_id ? $fatherBiGrandpa3->mother : null;
        $motherTriGrandpa6 = $fatherBiGrandma3 && $fatherBiGrandma3->father_id ? $fatherBiGrandma3->father : null;
        $motherTriGrandma6 = $fatherBiGrandma3 && $fatherBiGrandma3->mother_id ? $fatherBiGrandma3->mother : null;
        $fatherTriGrandpa7 = $motherBiGrandpa4 && $motherBiGrandpa4->father_id ? $motherBiGrandpa4->father : null;
        $fatherTriGrandma7 = $motherBiGrandpa4 && $motherBiGrandpa4->mother_id ? $motherBiGrandpa4->mother : null;
        $motherTriGrandpa8 = $motherBiGrandma4 && $motherBiGrandma4->father_id ? $motherBiGrandma4->father : null;
        $motherTriGrandma8 = $motherBiGrandma4 && $motherBiGrandma4->mother_id ? $motherBiGrandma4->mother : null;



        //$fatherGrandpa = $father && $father->father_id ? $father->father : null;
        //$fatherGrandma = $father && $father->mother_id ? $father->mother : null;

        //$motherGrandpa = $mother && $mother->father_id ? $mother->father : null;
        //$motherGrandma = $mother && $mother->mother_id ? $mother->mother : null;
        //$creator = Creator::find($user->creator_id);
       
        if($user->creator_id){
            $creator = Creator::findOrFail($user->creator_id);
            $user->creator = $creator;
        }

        if($user->proprietary_id){
            $proprietary = Proprietary::findOrFail($user->proprietary_id);
            $user->proprietary = $proprietary;
        }

        if($user->animal_id){
            $animal = Animal::findOrFail($user->animal_id);
            if($animal->race_id){
                $race = Race::findOrFail($animal->race_id);
                $animal->race = $race;
            }
            $user->animal = $animal;
        }
        //echo $user->animal;

        $childs = $user->childs;
        $colspan = $childs->count();
        $colspan = $colspan < 4 ? 4 : $colspan;
    
        $siblings = $user->siblings();

        return view('users.pedigree', compact(
            'user', 'childs', 'father', 'mother', 
            'fatherGrandpa',
            'fatherGrandma', 
            'motherGrandpa', 
            'motherGrandma',
            'siblings', 'colspan',
            'fatherBiGrandpa1',
            'fatherBiGrandma1',
            'motherBiGrandpa2',
            'motherBiGrandma2',
            'fatherBiGrandpa3',
            'fatherBiGrandma3',
            'motherBiGrandpa4',
            'motherBiGrandma4',

            'fatherTriGrandpa1',
            'fatherTriGrandma1',
            'motherTriGrandpa2',
            'motherTriGrandma2',
            'fatherTriGrandpa3',
            'fatherTriGrandma3',
            'motherTriGrandpa4',
            'motherTriGrandma4',
            'fatherTriGrandpa5',
            'fatherTriGrandma5',
            'motherTriGrandpa6',
            'motherTriGrandma6',
            'fatherTriGrandpa7',
            'fatherTriGrandma7',
            'motherTriGrandpa8',
            'motherTriGrandma8'
        ));
    }

    

}
