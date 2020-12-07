<?php

namespace App\Http\Controllers;

use DB;
use Storage;
use App\Couple;
use App\User;
use App\Offices;
use App\Specie;
use Illuminate\Http\Request;
use App\Http\Requests\Animal\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

//Núcleos
class OfficesController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = User::whereNotNull('office_id')->get();
        return view('offices.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Specie::all();
        
        return view('offices.create', compact('species'));
    }
 /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function register(Request $data)
    {

        //$selectId = $data->input('species'); 
        $office = Offices::create([
            'id' => Uuid::uuid4()->toString(),
            'description' => $data->get('name'),
            'registerquote' => $data->get('registerquote'),
            'duedate' => $data->get('duedate'),
            'species' => 'Gato'
        ]);
        //Log::info($selectId);
        $user = User::create([
            'id' => Uuid::uuid4()->toString(),
            'nickname' => $data['nickname'],
            'name' => $data['name'],
            'office_id' => $office->id
        ]);
        $office->manager_id = $user->id;    
        $office->save();
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
        $office = Offices::create([
            'id' => Uuid::uuid4()->toString(),
            'description' => $request->get('name'),
            'registerquote' => $request->get('registerquote'),
            'duedate' => $request->get('duedate'),
            'species' => $request->get('species'),
        ]);
        $user = new User([
            'id' => Uuid::uuid4()->toString(),
            'nickname' => $request->get('nickname'),
            'name' => $request->get('name'),
            'gender_id' => $request->get('gender_id'),
            'office_id' => $office->id,
        ]);
        $office->manager_id = $user->id;
        $office->save();
        $user->manager_id = $user->id;
        $user->save();
        
        return redirect('/offices')->with('success', 'Salvo com sucesso!');
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
        $office = User::find($id);
        return view('offices.edit', compact('office'));  
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

        $office = User::find($id);
        $office->name =  $request->get('name');
        $office->description = $request->get('description');
        $office->save();
        return redirect('/offices')->with('success', 'Alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = User::find($id);
        $office->delete();

        return redirect('/offices')->with('success', 'Excluido com sucesso!');
    }
}
