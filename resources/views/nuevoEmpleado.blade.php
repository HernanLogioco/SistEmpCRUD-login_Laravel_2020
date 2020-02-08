@extends('layouts.app')
@section('content')
<h3 class="display-4 p-3 text-center text-success">Nuevo Empleado</h1>
@if(session('mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('mensaje')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


<!-- VALIDACION DE INPUTS VACIOS... SI HAY ERROR LANZAR ALERTA -->
@switch($errors)

  @case ($errors->has('nombre'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Lo siento..!</strong> El campo <b class="text-danger">Nombre</b> es obligatorio.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
    @break

  @case ($errors->has('puesto'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Lo siento..!</strong> El campo <b class="text-danger">Puesto</b> es obligatorio.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
    @break
    
  @case ($errors->has('sueldo'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Lo siento..!</strong> El campo <b class="text-danger">Sueldo</b> es obligatorio.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
    @break

@endswitch 

<form class="font-weight-bold m-4 " action="{{route('crearEmp')}}" method="POST">
@csrf
  <div class="form-group row">
    <label  for="nombre" class="col-sm-1 col-form-label ">Nombre</label>
    <div class="col-sm-6">
      <input name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}"  placeholder="Ingrese el nombre completo...">
    </div>
  </div>
  <div class="form-group row">
    <label  for="puesto" class="col-sm-1 col-form-label">Puesto</label>
    <div class="col-sm-6">
      <input name="puesto" type="text" class="form-control @error('puesto') is-invalid @enderror" value="{{old('puesto')}}" placeholder="Ingrese el puesto...">
    </div>
  </div>
 
  <div class="form-group row">
    <label  for="descripcion" class="col-sm-1 col-form-label">Descripción</label>
    <div class="col-sm-6">
      <textarea name="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" value="{{old('descripcion')}}" placeholder="Ingrese una breve descripción aqui..."></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label  for="sueldo" class="col-sm-1 col-form-label">Sueldo</label>
    <div class="col-sm-6">
      <input name="sueldo" type="number" class="form-control @error('sueldo') is-invalid @enderror" value="{{old('sueldo')}}" placeholder="Ingrese el sueldo...">
    </div>
  </div>

  <div class="form-group row">
    
      <button type="submit" class="btn btn-primary btn-block">Guardar</button>
  </div>
</form>

@endsection