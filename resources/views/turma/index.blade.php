@extends('templates.template')
@section('content')
<h1 class="text-center" >Lista de Turmas</h1>
  <div class="text-center mt-3 mb-4">
  <a href="{{url('turmas/create')}}">
        <button class="btn btn-success">Cadastrar</button>
      </a>
    

  </div>
<div class="col-8  m-auto" >
@csrf
<table class="table text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Sigla</th>
      <th scope="col">Descricao</th>
      <th scope="col">Turno</th>
      <th scope="col">Serie</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  @foreach($turma as $turmas)
  @php
    $series=$turmas->find($turmas->id)->relSerie;
  @endphp
  
 
    <tr>
      <th scope="row">{{$turmas->id}}</th>
      <td>{{$turmas->nome}}</td>
      <td>{{$turmas->sigla}}</td>
      <td>{{$turmas->descricao}}</td>
      <td>{{$turmas->turno}}</td>
      <td>{{$series->nome}}</td>
     
      <td>
      <a href="{{url("turmas/$turmas->id")}}">
        <button class="btn btn-dark">Visualizar</button>
      </a>
      
      <a href="{{url("turmas/$turmas->id/edit")}}">
        <button class="btn btn-primary">Editar</button>
      </a> 
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>


</div>
@endsection