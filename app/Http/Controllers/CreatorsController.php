<?php

namespace App\Http\Controllers;

use App\Creator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
class CreatorsController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creators = User::whereNotNull('creator_id')->
                    where('office_id', '=' , Auth::user()->office_id)->
                    get();
        return view('creators.index', compact('creators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creators.create');
    }
 /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function register(array $data)
    {


        $creator = Creator::create([
            'id' => Uuid::uuid4()->toString()
        ]);
        $creator->save();
        $user = User::create([
            'id' => Uuid::uuid4()->toString(),
            'nickname' => $data['nickname'],
            'name' => $data['name'],
            'creator_id' => $creator->id
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
        
        $creator = Creator::create([
            'id' => Uuid::uuid4()->toString()
        ]);
        $creator->save();

        $user = new User([
            'id' => Uuid::uuid4()->toString(),
            'nickname' => $request->get('nickname'),
            'name' => $request->get('name'),
            'gender_id' => $request->get('gender_id'),
            'creator_id' => $creator->id,
            'office_id' => Auth::user()->office_id,
        ]);
        $user->save();
        $user->manager_id = $user->id;
        return redirect('/creators')->with('success', 'Salvo com sucesso!');
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
        $creator = User::find($id);
        return view('creators.edit', compact('creator'));  
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

        $creator = User::find($id);
        $creator->name =  $request->get('name');
        $creator->description = $request->get('description');
        $creator->save();
        return redirect('/creators')->with('success', 'Alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $creator = User::find($id);
        $creator->delete();

        return redirect('/creators')->with('success', 'Excluido com sucesso!');
    }
}
