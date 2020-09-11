@extends('templates.template')
@section('content')
<h1 class="text-center" >@if(isset($serie))Editar @else Cadastrar Serie @endif</h1>
  <div class="text-center mt-3 mb-4">
  <div class="col-8 m-auto">
  
    @if(isset($erros) && cont($erros)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
    @foreach($erros->all() as $erro)
      {{$erro}}
    @endforeach
    </div>
    @endif
    @if(isset($serie))
    <form action="{{url("series/$serie->id")}}" name="fEdit" id="fEdit" method="post"  >@method('PUT')
    @else
      <form action="{{url('series')}}" name="fCad" id="fCad" method="post" >
    @endif

  
  
    @csrf 
    
    <input class="form-control"type="text" name="nome" id="nome" placeholder="Nome" value="{{$serie->nome ??''}}" required>
    <input class="form-control"type="text" name="sigla" id="sigla" placeholder="Sigla" value="{{$serie->sigla??''}}" required>
    <input class="form-control"type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{$serie->descricao??''}}" required>
    <select class="form-control" name="id_curso" id="id_curso" required>
    <option value="{{$serie->relCurso->id ?? ''}}">{{$serie->relCurso->nome ?? 'Escolha o Curso'}}</option>
    @foreach($cursos as $curso)
    <option value="{{$curso->id}}">{{$curso->nome}}</option>
    @endforeach
    </select>
    <input type="submit" value="@if(isset($serie))Editar @else Cadastrar @endif" class="btn btn-primary">

  </form>

  </div>


  
</div>
@endsection