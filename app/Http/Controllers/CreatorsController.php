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
        $user = auth()->user();
        $creators = null;
        if(is_system_admin( $user )){
            $creators = User::whereNotNull('creator_id')->get();
        }else{
            $creators = User::where('office_id', '=' , $user->office_id)->get();
        }
        foreach ($creators as $creator)
        {
           $creator->creator =  $this->getCreator( $creator->creator_id );
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
        return view('creators.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $creatorid = Uuid::uuid4()->toString();
        $creator = new Creator([
            'id' => $creatorid,
            'broodtotal' => $request->get('broodtotal'),
            'certifyduedate' => $request->get('certifyduedate'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);
        $creator->manager_id = auth()->id();
        $creator->save();

        $userid = Uuid::uuid4()->toString();
        $user = User::create([
            'id' => $userid,
            'nickname' => $request->get('nickname'),
            'name' => $request->get('title'),            
            'email' => $request->get('email'),
            'gender_id' => 0,
            'password' => bcrypt($request->get('password')) 
        ]);
        $user->creator_id = $creatorid;
        $user->manager_id = auth()->id();
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
        $creator->creator =  $this->getCreator( $creator->creator_id );
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
        $creatoruser = User::find($id);
        $creatoruser->nickname =  $request->get('nickname');
        $creatoruser->name =  $request->get('name');
        $creatoruser->email = $request->get('email');
        $creatoruser->password = bcrypt($request->get('password')) ;
        $creatoruser->manager_id =  auth()->id();
        $creatoruser->save();

        $creator =  $this->getCreator( $creatoruser->creator_id );
        $creator->broodtotal =  $request->get('broodtotal');
        $creator->certifyduedate =  $request->get('certifyduedate');
        $creator->title =  $request->get('nickname');
        $creator->description =  $request->get('description');        
        $creator->manager_id =  auth()->id();
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
        $user = User::find($id);
        $creator = Creator::find($user->creator_id);
        $user->delete();
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
