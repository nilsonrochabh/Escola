<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

use App\Models\ModelCurso;
use App\Models\ModelSerie;

class SerieController extends Controller
{
    private $objCurso;
    private $objSerie;
    public function __construct()
    {
        $this->objCurso = new ModelCurso();
        $this->objSerie = new ModelSerie();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $serie = $this->objSerie->paginate(5);
        return view('serie/index',compact('serie'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = $this->objCurso->all();
        return view('serie/create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cadastro = $this->objSerie->create([
            'nome'=>$request->nome,
            'sigla'=>$request->sigla,
            'descricao'=>$request->descricao,
            'id_curso'=>$request->id_curso

        ]);
        if($cadastro){
            return redirect('series');
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
        $serie = $this->objSerie->find($id);
        return view('serie/show', compact('serie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie=$this->objSerie->find($id);
        $cursos=$this->objCurso->all();
        return view('serie/create',compact('serie','cursos'));
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
        $this->objSerie->where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'sigla'=>$request->sigla,
            'descricao'=>$request->descricao,
            'id_curso'=>$request->id_curso

        ]);
        return redirect('series');
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
        $t = $this->objSerie::where('id',$id)->first();
        $t->delete();

        // redirect
        Session::flash('message', 'Serie deletada com sucesso');
        return redirect('series');
    }

}
