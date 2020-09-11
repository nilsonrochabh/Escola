<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\ModelAluno;
use App\Models\ModelTurma;

class AlunoController extends Controller
{
    private $objTurma;
    private $objAluno;
    public function __construct()
    {
        $this->objAluno = new ModelAluno();
        $this->objTurma = new ModelTurma();
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aluno = $this->objAluno->paginate(5);
        return view('aluno/index',compact('aluno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turmas = $this->objTurma->all();
        return view('aluno/create', compact('turmas'));
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cadastro = $this->objAluno->create([
            'nome'=>$request->nome,
            'matricula'=>$request->matricula,
            'datanascimento'=>$request->datanascimento,
            'email'=>$request->email,
            'status'=>$request->status,
            'id_turma'=>$request->id_turma

        ]);
        if($cadastro){
            return redirect('alunos');
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
        $aluno = $this->objAluno->find($id);
        return view('aluno/show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno=$this->objAluno->find($id);
        $turmas=$this->objTurma->all();
        return view('aluno/create',compact('aluno','turmas'));
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
        $this->objAluno->where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'matricula'=>$request->matricula,
            'datanascimento'=>$request->datanascimento,
            'email'=>$request->email,
            'status'=>$request->status,
            'id_turma'=>$request->id_turma

        ]);
        return redirect('alunos');
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
        $t = $this->objAluno::where('id',$id)->first();
        $t->delete();

        // redirect
        Session::flash('message', 'Aluno deletada com sucesso');
        return redirect('alunos');
    }


    public function search(Request $request)
    {
        $a = $this->objAluno->search($request->filtro);
        $aluno = $this->objAluno->paginate(5);
        return view('aluno/index',compact('aluno',$a));

    }
}
