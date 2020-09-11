@extends('templates.template')
@section('content')
<h1 class="text-center" >Lista de Alunos</h1>
  <div class="text-center mt-3 mb-4">

  <a href="{{url('alunos/create')}}">
        <button class="btn btn-success">Cadastrar</button>
      </a>
<hr>
      <form action="{{route('alunos.search')}}" method="post" class="form form-inline">
  @csrf
  <input type="text" name="filtro" id="filtro" placeholder="Buscar" class="form-control">
  <button type="submit" value="" class="btn btn-info">Buscar</button>
  </form>    

  </div>
<div class="col-8  m-auto" >
@csrf
<table class="table text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Matricula</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Turma</th>
      <th scope="col">Status</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  @foreach($aluno as $alunos)
  @php
    $turma=$alunos->find($alunos->id)->relTurma;
  @endphp
  
 
    <tr>
      <th scope="row">{{$alunos->id}}</th>
      <td>{{$alunos->nome}}</td>
      <td>{{$alunos->email}}</td>
      <td>{{$alunos->matricula}}</td>
      <td>{{$alunos->datanascimento}}</td>
      <td>{{$turma->nome}}</td>
      <td>{{$alunos->status}}</td>
    
      <td>
      <a href="{{url("alunos/$alunos->id")}}">
        <button class="btn btn-dark">Visualizar</button>
      </a>
      
      <a href="{{url("alunos/$alunos->id/edit")}}">
        <button class="btn btn-primary">Editar</button>
      </a> 
     
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
{{$aluno->links()}}

</div>
@endsection