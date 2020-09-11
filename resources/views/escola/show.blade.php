@extends('templates.template')
@section('content')
<h1 class="text-center" >Visualizar Escola</h1>
  <div class="text-center mt-3 mb-4">
  Nome: {{$escola->name}}<br />
  Sigla: {{$escola->sigla}}<br />
  Telefone: {{$escola->telefone}}<br />
  Cidade: {{$escola->cidade}}<br />
  Estado: {{$escola->estado}}<br />
  
</div>
<div class="text-center mt-3 mb-4">
  <a href="{{url('/escolas')}}">
        <button class="btn btn-success">Voltar</button>
      </a>
    

  </div>
@endsection