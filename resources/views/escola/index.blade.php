@extends('templates.template')
@section('content')
<h1 class="text-center" >Lista de Escolas</h1>
  <div class="text-center mt-3 mb-4">
  <a href="{{url('escolas/create')}}">
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
      <th scope="col">Telefone</th>
      <th scope="col">Cidade</th>
      <th scope="col">Estado</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  @foreach($escola as $escolas)
  
 
    <tr>
      <th scope="row">{{$escolas->id}}</th>
      <td>{{$escolas->name}}</td>
      <td>{{$escolas->sigla}}</td>
      <td>{{$escolas->telefone}}</td>
      <td>{{$escolas->cidade}}</td>
      <td>{{$escolas->estado}}</td>
     
      <td>
      <a href="{{url("escolas/$escolas->id")}}">
        <button class="btn btn-dark">Visualizar</button>
      </a>
      
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>


</div>
@endsection