@extends('templates.template')
@section('content')
<h1 class="text-center" >Visualizar</h1>
  <div class="text-center mt-3 mb-4">
@php
  $escola = $aluno->find($aluno->id)->relTurma;
@endphp
  Nome: {{$aluno->nome}}<br />
  E-mail: {{$aluno->email}}<br />
  Matricula: {{$aluno->matricula}}<br />
  Data de Nascimento: {{$aluno->datanascimento}}<br />
  Turma: {{$aluno->turma}}<br />
  Status: {{$aluno->status}}<br />
  
  {{ Form::open(array('url' => 'alunos/' . $aluno->id, 'class' => 'pull-right')) }}
  {{ Form::hidden('_method', 'DELETE') }}
  {{ Form::submit('Deletar  Aluno', array('class' => 'btn btn-danger')) }}
  {{ Form::close() }}
  
</div>
@endsection