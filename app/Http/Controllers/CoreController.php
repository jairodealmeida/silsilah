<?php

namespace App\Http\Controllers;

use DB;
use Storage;
use App\Couple;
use App\User;
use App\Core;
use Illuminate\Http\Request;
use App\Http\Requests\Animal\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

//Núcleos
class CoreController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cores = User::whereNotNull('core_id')->get();
        return view('cores.index', compact('cores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cores.create');
    }
 /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function register(array $data)
    {

        $core = Core::create([
            'id' => Uuid::uuid4()->toString()
        ]);
        $core->save();
        $user = User::create([
            'id' => Uuid::uuid4()->toString(),
            'nickname' => $data['nickname'],
            'name' => $data['name'],
            'core_id' => $core->id
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
        $core = Core::create([
            'id' => Uuid::uuid4()->toString()
        ]);
        $core->save();

        $user = new User([
            'id' => Uuid::uuid4()->toString(),
            'nickname' => $request->get('nickname'),
            'name' => $request->get('name'),
            'gender_id' => $request->get('gender_id'),
            'core_id' => $core->id,
        ]);
        $user->save();
        $user->manager_id = $user->id;
        return redirect('/cores')->with('success', 'Salvo com sucesso!');
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
        $core = User::find($id);
        return view('cores.edit', compact('core'));  
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

        $core = User::find($id);
        $core->name =  $request->get('name');
        $core->description = $request->get('description');
        $core->save();
        return redirect('/cores')->with('success', 'Alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $core = User::find($id);
        $core->delete();

        return redirect('/cores')->with('success', 'Excluido com sucesso!');
    }
}
