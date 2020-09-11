
@extends('templates.template')
@section('content')

<h1 class="text-center" >Cadastrar Escola </h1>
  <div class="text-center mt-3 mb-4">
  <div class="col-8 m-auto">
    <form action="{{url('escolas')}}" name="fCad" id="fCad" method="post" >
    @csrf 
    <input class="form-control"type="text" name="name" id="name" placeholder="Nome"  required>
    <input class="form-control"type="text" name="sigla" id="sigla" placeholder="Sigla" required>
    <input class="form-control" class="telefone"type="text" name="telefone" id="telefone"  placeholder="Telefone" required>


    <input class="form-control"type="text" name="cidade" id="cidade" placeholder="cidade" required>
    <input class="form-control"type="text" name="estado" id="estado" placeholder="estado" required>
    <input type="submit"  class="btn btn-primary" >

  </form>

  </div>



</div>
@endsection
