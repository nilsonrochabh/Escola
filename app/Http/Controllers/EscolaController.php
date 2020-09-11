<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelEscola;

class EscolaController extends Controller
{

    private $objEscola;
    public function __construct()
    {
        $this->objEscola = new ModelEscola();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escola = $this->objEscola->paginate(5);
        return view('escola/index',compact('escola'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escola/create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cadastro = $this->objEscola->create([
            'name'=>$request->name,
            'sigla'=>$request->sigla,
            'telefone'=>$request->telefone,
            'cidade'=>$request->cidade,
            'estado'=>$request->estado
        ]);
        if($cadastro){
            return redirect('escolas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $escola = $this->objEscola->find($id);
        return view('escola/show', compact('escola'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
