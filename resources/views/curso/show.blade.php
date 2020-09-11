@extends('templates.template')
@section('content')
<h1 class="text-center" >Visualizar</h1>
  <div class="text-center mt-3 mb-4">
@php
  $escola = $curso->find($curso->id)->relEscola;
@endphp
  Nome: {{$curso->nome}}<br />
  Sigla: {{$curso->sigla}}<br />
  Escola: {{$escola->name}}<br />
  
  {{ Form::open(array('url' => 'cursos/' . $curso->id, 'class' => 'pull-right')) }}
  {{ Form::hidden('_method', 'DELETE') }}
  {{ Form::submit('Deletar  Curso', array('class' => 'btn btn-danger')) }}
  {{ Form::close() }}

</div>
@endsection