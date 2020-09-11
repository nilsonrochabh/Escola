@extends('templates.template')
@section('content')
<h1 class="text-center" >@if(isset($aluno))Editar @else Cadastrar aluno @endif</h1>
  <div class="text-center mt-3 mb-4">
  <div class="col-8 m-auto">
  
    @if(isset($erros) && cont($erros)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
    @foreach($erros->all() as $erro)
      {{$erro}}
    @endforeach
    </div>
    @endif
    @if(isset($aluno))
    <form action="{{url("alunos/$aluno->id")}}" name="fEdit" id="fEdit" method="post"  >@method('PUT')
    @else
      <form action="{{url('alunos')}}" name="fCad" id="fCad" method="post" >
    @endif

  
  
    @csrf 
    
    <input class="form-control"type="text" name="nome" id="nome" placeholder="Nome" value="{{$aluno->nome ??''}}" required>
    <input class="form-control"type="text" name="matricula" id="matricula" placeholder="Matricula" value="{{$aluno->matricula ??''}}" required>
    <input class="form-control"type="text" name="datanascimento" id="datanascimento" placeholder="Data de Nascimento" value="{{$aluno->datanascimento ??''}}" required>
    <input class="form-control"type="email" name="email" id="email" placeholder="E-mail" value="{{$aluno->email ??''}}" required>
    
    <select class="form-control" name="id_turma" id="id_turma" required>
    <option value="{{$aluno->relTurma->id ?? ''}}">{{$aluno->relTurma->nome ?? 'Escolha a Turma'}}</option>
    @foreach($turmas as $turma)
    <option value="{{$turma->id}}">{{$turma->nome}}</option>
    @endforeach
    </select>
    
    <select class="form-control" name="status" id="status" required>
        <option >Status</option>
        <option >Ativo</option>
        
    <option >Inativo</option>
    
    </select>
    <input type="submit" value="@if(isset($aluno))Editar @else Cadastrar @endif" class="btn btn-primary">

  </form>

  </div>


  
</div>
@endsection