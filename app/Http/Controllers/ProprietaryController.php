<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proprietary;
use App\Specie;

class ProprietaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proprietaries = Proprietary::all();
        return view('proprietaries.index', compact('proprietaries'));
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
        $vo = $this->fillInsertVO($request);
        $vo->save();
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
        $proprietary = Proprietary::find($id);
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
            'name'=>'required',
            'description'=>'required'
        ]);
        $vo = $this->fillUpdateVO($request, $id);
        $vo->save();
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
        $vo = Proprietary::find($id);
        $vo->delete();
        return redirect('/proprietaries')->with('success', 'Registro removido!');
    }

    private function fillInsertVO(Request $request){
        
        return new Proprietary([
            'name' => $request->get('name'),
            'cpf' => $request->get('cpf'),
            'rg' => $request->get('rg'),
            'phone' => $request->get('phone'),
            'mobile' => $request->get('mobile'),
            'address' => $request->get('address'),
            'num_address' => $request->get('num_address'),
            'comp_address' => $request->get('comp_address'),
            'cep' => $request->get('cep'),
            'manager_id' => $request->get('manager_id'),
        ]);
    }

    private function fillUpdateVO(Request $request, $id){
        $vo = Proprietary::find($id);
        $vo->name =  $request->get('name');
        $vo->cpf = $request->get('cpf');
        $vo->rg = $request->get('rg');
        $vo->phone = $request->get('phone');
        $vo->mobile = $request->get('mobile');
        $vo->address = $request->get('address');
        $vo->num_address = $request->get('num_address');
        $vo->comp_address = $request->get('comp_address');
        $vo->cep = $request->get('cep');
        $vo->manager_id = $request->get('manager_id');
        return $vo;
    }

    
}
