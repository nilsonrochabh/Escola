@extends('templates.template')
@section('content')
<h1 class="text-center" >Lista de Curso</h1>
  <div class="text-center mt-3 mb-4">
  <a href="{{url('cursos/create')}}">
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
      <th scope="col">Escola</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  @foreach($curso as $cursos)
  @php
    $escola=$cursos->find($cursos->id)->relEscola;
  @endphp
  
 
    <tr>
      <th scope="row">{{$cursos->id}}</th>
      <td>{{$cursos->nome}}</td>
      <td>{{$cursos->sigla}}</td>
      <td>{{$escola->name}}</td>
      <td>
      <a href="{{url("cursos/$cursos->id")}}">
        <button class="btn btn-dark">Visualizar</button>
      </a>
      
      <a href="{{url("cursos/$cursos->id/edit")}}">
        <button class="btn btn-primary">Editar</button>
      </a> 
   
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
{{$curso->links()}}

</div>
@endsection