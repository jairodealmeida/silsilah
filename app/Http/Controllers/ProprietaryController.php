<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proprietary;
use App\User;
use App\Specie;
use Ramsey\Uuid\Uuid;

class ProprietaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$proprietaries = Proprietary::all();
        $proprietaries = User::whereNotNull('proprietary_id')->get();
        foreach ($proprietaries as $proprietary)
        {
           $proprietary->proprietary =  $this->getProprietary( $proprietary->proprietary_id );
        }
        return view('proprietaries.index', compact('proprietaries'));
    } 
    private function getProprietary(string $proprietary_id)
    {
        //return Offices::where('id', $office_id);
        return Proprietary::find($proprietary_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proprietaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'mobile'=>'required'
        ]);
        $proprietaryid  = Uuid::uuid4()->toString();
        $proprietary = new Proprietary([
            'id' => $proprietaryid,
            'name' => $request->get('name'),
            'cpf' => $request->get('cpf'),
            'rg' => $request->get('rg'),
            'phone' => $request->get('phone'),
            'mobile' => $request->get('mobile'),
            'address' => $request->get('address'),
            'num_address' => $request->get('num_address'),
            'comp_address' => $request->get('comp_address'),
            'cep' => $request->get('cep'),
        ]);
        $proprietary->manager_id = auth()->id();
        $proprietary->save();

        $userId = Uuid::uuid4()->toString();
        $user = User::create([
            'id' => $userId,
            'nickname' => $request->get('name'),
            'name' =>  $request->get('name'),
        ]);
        $user->proprietary_id = $proprietaryid;
        $user->manager_id = auth()->id();
        $user->save();

        return redirect('/proprietaries')->with('success', 'Registro salvo!');
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
        $proprietary = User::find($id);
        $proprietary->proprietary =  $this->getProprietary( $proprietary->proprietary_id );
        return view('proprietaries.edit', compact('proprietary'));  
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
        $proprietaryuser = User::find($id);
        $proprietaryuser->name =  $request->get('name');
        $proprietaryuser->manager_id =  auth()->id();
        $proprietaryuser->save();

        $proprietary =  $this->getProprietary( $proprietaryuser->proprietary_id );
        $proprietary->name =  $request->get('name');
        $proprietary->cpf = $request->get('cpf');
        $proprietary->rg = $request->get('rg');
        $proprietary->phone = $request->get('phone');
        $proprietary->mobile = $request->get('mobile');
        $proprietary->address = $request->get('address');
        $proprietary->num_address = $request->get('num_address');
        $proprietary->comp_address = $request->get('comp_address');
        $proprietary->cep = $request->get('cep');
        $proprietary->manager_id =  auth()->id();
        $proprietary->save();

        return redirect('/proprietaries')->with('success', 'Registro alterado!');
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
        $proprietary = Proprietary::find($user->proprietary_id);
        $user->delete();
        $proprietary->delete();
        return redirect('/proprietaries')->with('success', 'Registro removido!');
    }
  
}
