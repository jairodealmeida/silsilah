<?php

namespace App\Http\Controllers;

use DB;
use Storage;
use App\Couple;
use App\User;
use App\Animal;
use Illuminate\Http\Request;
use App\Http\Requests\Animal\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class AnimalsController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = Auth::user();
        //$animals = User::where('core_id', '=' , Auth::user()->core_id);
        //$animals = User::whereNotNull('animal_id')->get();
        //$animals = User::all();
        $animals = User::whereNotNull('animal_id')->
                    where('core_id', '=' , Auth::user()->core_id)->
                    get();
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animals.create');
    }
 /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function register(array $data)
    {

        /*$table->increments('id');
        $table->uuid('race_id')->nullable();
        $table->string('proprietary')->nullable();
        $table->uuid('pedigree_id')->nullable();
        $table->uuid('core_id')->nullable();
        $table->timestamps();*/
        //printf($data);
        $animal = Animal::create([
            'id' => Uuid::uuid4()->toString()
        ]);
        $animal->save();
        $user = User::create([
            'id' => Uuid::uuid4()->toString(),
            'nickname' => $data['nickname'],
            'name' => $data['name'],
            //'gender_id' => $data['gender_id'],
            //'email' => $data['email'],
            //'password' => bcrypt($data['password']),
            //'core_id' => $core->id
            'animal_id' => $animal->id
        ]);
        $user->manager_id = $user->id;
        $user->save();
        return $user;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);*/
        
        $animal = Animal::create([
            'id' => Uuid::uuid4()->toString()
        ]);
        $animal->save();

        $user = new User([
            'id' => Uuid::uuid4()->toString(),
            'nickname' => $request->get('nickname'),
            'name' => $request->get('name'),
            'gender_id' => $request->get('gender_id'),
            'animal_id' => $animal->id,
            'core_id' => Auth::user()->core_id,
        ]);
        $user->save();
        $user->manager_id = $user->id;
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
            'name'=>'required',
            'description'=>'required'
        ]);

        $animal = User::find($id);
        $animal->name =  $request->get('name');
        $animal->description = $request->get('description');
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
        $animal = User::find($id);
        $animal->delete();

        return redirect('/animals')->with('success', 'Excluido com sucesso!');
    }
}
