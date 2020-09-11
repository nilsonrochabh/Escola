@extends('templates.template')
@section('content')
<h1 class="text-center" >@if(isset($curso))Editar @else Cadastrar Curso @endif</h1>
  <div class="text-center mt-3 mb-4">
  <div class="col-8 m-auto">
  
    @if(isset($erros) && cont($erros)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
    @foreach($erros->all() as $erro)
      {{$erro}}
    @endforeach
    </div>
    @endif
    @if(isset($curso))
    <form action="{{url("cursos/$curso->id")}}" name="fEdit" id="fEdit" method="post"  >@method('PUT')
    @else
      <form action="{{url('cursos')}}" name="fCad" id="fCad" method="post" >
    @endif

  
  
    @csrf 
    
    <input class="form-control"type="text" name="nome" id="nome" placeholder="Nome" value="{{$curso->nome ??''}}" required>
    <input class="form-control"type="text" name="sigla" id="sigla" placeholder="Sigla" value="{{$curso->sigla??''}}" required>
    <select class="form-control" name="id_escola" id="id_escola" required>
    <option value="{{$curso->relEscola->id ?? ''}}">{{$curso->relEscola->name ?? 'Escolha a Escola'}}</option>
    @foreach($escolas as $escola)
    <option value="{{$escola->id}}">{{$escola->name}}</option>
    @endforeach
    </select>
    <input type="submit" value="@if(isset($curso))Editar @else Cadastrar @endif" class="btn btn-primary">

  </form>

  </div>


  
</div>
@endsection