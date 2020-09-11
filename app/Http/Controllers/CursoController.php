<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\ModelCurso;
use App\Models\ModelEscola;

class CursoController extends Controller
{
    private $objEscola;
    private $objCurso;
    public function __construct()
    {
        $this->objEscola = new ModelEscola();
        $this->objCurso = new ModelCurso();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curso = $this->objCurso->paginate(5);
        return view('curso/index',compact('curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $escolas = $this->objEscola->all();
        return view('curso/create', compact('escolas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cadastro = $this->objCurso->create([
            'nome'=>$request->nome,
            'sigla'=>$request->sigla,
            'id_escola'=>$request->id_escola

        ]);
        if($cadastro){
            return redirect('cursos');
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
        $curso = $this->objCurso->find($id);
        return view('curso/show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso=$this->objCurso->find($id);
        $escolas=$this->objEscola->all();
        return view('curso/create',compact('curso','escolas'));
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
        $this->objCurso->where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'sigla'=>$request->sigla,
            'id_escola'=>$request->id_escola

        ]);
        return redirect('cursos');
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
       $t = $this->objCurso::where('id',$id)->first();
       $t->delete();

       // redirect
       Session::flash('message', 'Curso deletada com sucesso');
       return redirect('cursos');
    }
}
