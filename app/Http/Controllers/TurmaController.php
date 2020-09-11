<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\ModelSerie;
use App\Models\ModelTurma;

class TurmaController extends Controller
{


    private $objTurma;
    private $objSerie;
    public function __construct()
    {
        $this->objTurma = new ModelTurma();
        $this->objSerie = new ModelSerie();
    }
    /**
     * 
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turma = $this->objTurma->paginate(5);
        return view('turma/index',compact('turma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $series = $this->objSerie->all();
        return view('turma/create', compact('series'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cadastro = $this->objTurma->create([
            'nome'=>$request->nome,
            'sigla'=>$request->sigla,
            'descricao'=>$request->descricao,
            'turno'=>$request->turno,
            'id_serie'=>$request->id_serie

        ]);
        if($cadastro){
            return redirect('turmas');
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
        $turma = $this->objTurma->find($id);
        return view('turma/show', compact('turma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turma=$this->objTurma->find($id);
        $series=$this->objSerie->all();
        return view('turma/create',compact('turma','series'));
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
        $this->objTurma->where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'sigla'=>$request->sigla,
            'descricao'=>$request->descricao,
            'turno'=>$request->turno,
            'id_serie'=>$request->id_serie

        ]);
        return redirect('turmas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $t = $this->objTurma::where('id',$id)->first();
        $t->delete();

        // redirect
        Session::flash('message', 'Turma deletada com sucesso');
        return redirect('turmas');
    }
}
