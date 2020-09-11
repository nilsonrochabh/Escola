@extends('templates.template')
@section('content')
<h1 class="text-center" >Visualizar Serie</h1>
  <div class="text-center mt-3 mb-4">
@php
  $curso = $serie->find($serie->id)->relCurso;
@endphp
  Nome: {{$serie->nome}}<br />
  Sigla: {{$serie->sigla}}<br />
  Descrição: {{$serie->descricao}}<br />
  Curso: {{$serie->nome}}<br />
  {{ Form::open(array('url' => 'series/' . $serie->id, 'class' => 'pull-right')) }}
  {{ Form::hidden('_method', 'DELETE') }}
  {{ Form::submit('Deletar  Serie', array('class' => 'btn btn-danger')) }}
  {{ Form::close() }}


@endsection