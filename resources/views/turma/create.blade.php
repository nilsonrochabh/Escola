@extends('templates.template')
@section('content')
<h1 class="text-center" >@if(isset($turma))Editar @else Cadastrar Turma @endif</h1>
  <div class="text-center mt-3 mb-4">
  <div class="col-8 m-auto">
  
    @if(isset($erros) && cont($erros)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
    @foreach($erros->all() as $erro)
      {{$erro}}
    @endforeach
    </div>
    @endif
    @if(isset($turma))
    <form action="{{url("turmas/$turma->id")}}" name="fEdit" id="fEdit" method="post"  >@method('PUT')
    @else
      <form action="{{url('turmas')}}" name="fCad" id="fCad" method="post" >
    @endif

  
  
    @csrf 
    
    <input class="form-control"type="text" name="nome" id="nome" placeholder="Nome" value="{{$turma->nome ??''}}" required>
    <input class="form-control"type="text" name="sigla" id="sigla" placeholder="Sigla" value="{{$turma->sigla??''}}" required>
    <input class="form-control"type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{$turma->descricao??''}}" required>
    <select class="form-control" name="turno" id="turno" required>
        <option >Escolha o Horário</option>
        <option >Matutino</option>
        
    <option >Vespetino</option>
    
    </select>
       
    
    </select>
    <select class="form-control" name="id_serie" id="id_serie" required>
    <option value="{{$turma->relSerie->id ?? ''}}">{{$turma->relSerie->nome ?? 'Escolha o Serie'}}</option>
    
    @foreach($series as $serie)
    <option value="{{$serie->id}}">{{$serie->nome}}</option>
    @endforeach
    </select>




    <input type="submit" value="@if(isset($turma))Editar @else Cadastrar @endif" class="btn btn-primary">

  </form>

  </div>


  
</div>
@endsection