@extends('templates.template')
@section('content')
<h1 class="text-center" >Visualizar Turma</h1>
  <div class="text-center mt-3 mb-4">
@php
  $serie = $turma->find($turma->id)->relSerie;
@endphp
  Nome: {{$turma->nome}}<br />
  Sigla: {{$turma->sigla}}<br />
  Descrição: {{$turma->descricao}}<br />
  Horario: {{$turma->turno}}<br />
  Curso: {{$turma->nome}}<br />
  {{ Form::open(array('url' => 'turmas/' . $turma->id, 'class' => 'pull-right')) }}
  {{ Form::hidden('_method', 'DELETE') }}
  {{ Form::submit('Deletar  turmas', array('class' => 'btn btn-danger')) }}
  {{ Form::close() }}
</div>
@endsection