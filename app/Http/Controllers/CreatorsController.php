<?php

namespace App\Http\Controllers;

use App\Proprietary;
use App\Creator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;
class CreatorsController extends Controller
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
        //$creators = User::whereNotNull('creator_id')->
        //            where('office_id', '=' , Auth::user()->office_id)->
        //            get();
        //return view('creators.index', compact('creators'));
        $creators = User::whereNotNull('creator_id')->get();
        foreach ($creators as $creator)
        {
           $creator->creator_id =  $this->getCreator( $creator->creator_id );
        }
        return view('creators.index', compact('creators'));
    }
    private function getCreator(string $creator_id)
    {
        return Creator::find($creator_id);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proprietaries = Proprietary::all();
        return view('creators.create', compact('proprietaries'));
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
        $creatorid = Uuid::uuid4()->toString();
        $userid = Uuid::uuid4()->toString();
        $creator = Creator::create([
            'id' => $creatorid,
            'broodtotal' => $request->get('broodtotal'),
            'certifyduedate' => $request->get('certifyduedate'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'manager_id' => $userid
        ]);
        $creator->save();

        $user = new User([
            'id' => $userid,
            'nickname' => $request->get('nickname'),
            'name' => $request->get('title'),            
            'email' => $request->get('email'),
            'gender_id' => 0,
            'password' => bcrypt($request->get('password')) 
        ]);
        $user->creator_id = $creatorid;
        $user->manager_id = $user->id;
        $user->save();
        
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
        $creator->creator_id =  $this->getCreator( $creator->creator_id );
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
        $creator = User::find($id);
        $creator->nickname =  $request->get('nickname');
        $creator->name =  $request->get('name');
        $creator->description = $request->get('description');
        $creator->email = $request->get('email');
        $creator->password = bcrypt($request->get('password')) ;
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

     /**
     * Block the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function block($id)
    {
        $creator = User::find($id);
        
       
        if($creator->blocked){
            $creator->blocked = false;
            $msg =  'Habilitado com sucesso!'; 
        }else{
            $creator->blocked = true;
            
            $msg =  'Bloqueado com sucesso!';    
        }
        $creator->save();
        return redirect('/creators')->with('success', $msg);
    }
}
