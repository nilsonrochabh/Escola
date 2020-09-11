@extends('templates.template')
@section('content')
<h1 class="text-center" >Lista de Series</h1>
  <div class="text-center mt-3 mb-4">
  <a href="{{url('series/create')}}">
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
      <th scope="col">Curso</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  @foreach($serie as $series)
  @php
    $curso=$series->find($series->id)->relCurso;
  @endphp
  
 
    <tr>
      <th scope="row">{{$series->id}}</th>
      <td>{{$series->nome}}</td>
      <td>{{$series->sigla}}</td>
      <td>{{$series->descricao}}</td>
      <td>{{$curso->nome}}</td>
      <td>
      <a href="{{url("series/$series->id")}}">
        <button class="btn btn-dark">Visualizar</button>
      </a>
      
      <a href="{{url("series/$series->id/edit")}}">
        <button class="btn btn-primary">Editar</button>
      </a> 
      
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>


</div>
@endsection