@extends('templates.template')


@section('content')
<h1 class="text-center" >Sistema Escola</h1>
  <div class="text-center mt-3 mb-4">
  
    <div class="col-8 m-auto">


<div class="row">
  <div class="column">
    <div class="card">
    <img  class="card-img-top" src="assets/img/escola.png" width="200" heigth="200">
    <a href="/escolas" class="btn btn-primary">Escola</a>   
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img  class="card-img-top" src="assets/img/curso.png" width="200" heigth="200">
    <a href="/cursos" class="btn btn-primary">Curso</a>   
    </div>
  </div>

 
  
  <div class="column">
    <div class="card">
    <img  class="card-img-top" src="assets/img/serie.png" width="200" heigth="200">
    <a href="/series" class="btn btn-primary">Série</a>
    </div>
  </div>
  <br />
  <div class="column">
    <div class="card">
    <img  class="card-img-top" src="assets/img/turma.jpg" width="200" heigth="200">
    <a href="/turmas" class="btn btn-primary">Turma</a>
      
    </div>
  </div>
  <div class="column">
    <div class="card">
    <img  class="card-img-top" src="assets/img/aluno.png" width="200" heigth="200">
    <a href="/alunos" class="btn btn-primary">Alunos</a>   
    </div>
  </div>
</div>


@endsection