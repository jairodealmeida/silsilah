<?php

namespace App\Http\Controllers;

use DB;
use Storage;
use App\Couple;
use App\User;
use App\Animal;
use App\Race;
use App\Specie;
use App\Proprietary;
use Illuminate\Http\Request;
use App\Http\Requests\Animal\UpdateRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;
class AnimalsController extends Controller
{

  /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nickname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function render($request, Exception $exception)
    {
        if ( $exception instanceof \Illuminate\Database\QueryException ) {
        }
        return parent::render($request, $exception);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $animals = null;
        if(is_system_admin( $user )){
            $animals = User::whereNotNull('animal_id')->get();
        }else{
            $animals = User::where('office_id', '=' , $user->office_id)->get();
        }
        foreach ($animals as $animal)
        {
           $animal->animal =  $this->getAnimal( $animal->animal_id );
        }
        return view('animals.index', compact('animals'));
    }

    private function getAnimal(string $animal_id)
    {
        return Animal::find($animal_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /*$species = Specie::all();
        $races = Race::all();*/
        $proprietaries = Proprietary::all();
        $races = Race::all();
        //return view('offices.create', compact('species'));
        return view('animals.create',
             compact('proprietaries','races'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animalId = Uuid::uuid4()->toString();
        $animal = new Animal([
            'id' => $animalId
        
        ]);
        $animal->genotype = $request->get('genotype');
        $animal->proprietary_id = $request->get('proprietary');
        $animal->race_id = $request->get('race');
        $animal->manager_id = auth()->id();
        $animal->save();

        $userId = Uuid::uuid4()->toString();
        $user = User::create([
            'id' => $userId,
            'nickname' => $request->get('nickname'),
            'name' => $request->get('name'),
            'gender_id' => $request->get('gender_id'),
        ]);
        $user->manager_id = auth()->id();
        $user->animal_id = $animalId;
        $user->save();
        return redirect('/animals')->with('success', 'Salvo com sucesso!');
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
        $animal = User::find($id);
        $animal->animal =  $this->getAnimal( $animal->animal_id );
        return view('animals.edit', compact('animal'));  
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
            'name'=>'required'
        ]);

        $animaluser = User::find($id);
        $animaluser->name =  $request->get('name');
        $animaluser->description = $request->get('description');
        $animaluser->manager_id =  auth()->id();
        $animaluser->save();

        $animal =  $this->getAnimal( $animaluser->animal_id );
        $animal->race_id = $request->get('race');
        $animal->genotype = $request->get('genotype');
        $animal->manager_id =  auth()->id();
        $animal->save();    

        return redirect('/animals')->with('success', 'Alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $animal = Animal::find($user->animal_id);
        $user->delete();
        $animal->delete();

        return redirect('/animals')->with('success', 'Excluido com sucesso!');
    }
}
