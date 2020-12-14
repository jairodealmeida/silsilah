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
use Illuminate\Support\Facades\Validator;
//Núcleos
class OfficesController extends Controller
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
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = User::whereNotNull('office_id')->get();
        foreach ($offices as $office)
        {
           $office->office_id =  $this->getOffice( $office->office_id );
        }
        return view('offices.index', compact('offices'));
    }
    private function getOffice(string $office_id)
    {
        //return Offices::where('id', $office_id);
        return Offices::find($office_id);
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
            'specie' => $data->get('specie')
        ]);
        //Log::info($selectId);
        $user = User::create([
            'id' => Uuid::uuid4()->toString(),
            'nickname' => $data['nickname'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']) ,
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
        
        $officeid = Uuid::uuid4()->toString();
        $userid = Uuid::uuid4()->toString();
        $office = Offices::create([
            'id' => $officeid,
            'description' => $request->get('name'),
            'registerquote' => $request->get('registerquote'),
            'duedate' => $request->get('duedate'),
            'specie' => $request->get('specie'),
            'manager_id' => $userid
        ]);
        $office->save();
        //$user = new User([
        $user = User::create([
            'id' => $userid,
            'nickname' => $request->get('nickname'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'gender_id' => 0,
            'password' => bcrypt($request->get('password')) 
        ]);
        //$office->manager_id = $user->id;
        //$office->save();
        $user->office_id = $officeid;
        $user->manager_id = $user->id;
        $user->save();
        //$office->manager_id = $user->id;
        //$office->save();
        
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
        $species = Specie::all();
        $office = User::find($id);
        return view('offices.edit', compact('office','species'));  
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
        /*$request->validate([
            'nickname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);*/

        $office = User::find($id);
        $office->nickname =  $request->get('nickname');
        $office->name =  $request->get('name');
        $office->email = $request->get('email');
        $office->password = bcrypt($request->get('password')) ;
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


     /**
     * Block the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function block($id)
    {
        $office = User::find($id);
        
       
        if($office->blocked){
            $office->blocked = false;
            $msg =  'Habilitado com sucesso!'; 
        }else{
            $office->blocked = true;
            
            $msg =  'Bloqueado com sucesso!';    
        }
        $office->save();
        return redirect('/offices')->with('success', $msg);
    }
}
