@extends('layouts.app') @section('content')
<h3 class="display-4 text-center text-success p-3">Modificar Empleado Nro:{{$infoEmpleado->id}}</h1>

@if(session('mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('mensaje')}}</strong>
</div>
@endif
<!-- al ejecutar el boton submit envio a la ruta el id del empleado y cambio el metodo dentro del form -->
<form class="font-weight-bold m-4 " action="{{route('updateEmp',$infoEmpleado->id)}}" method="POST">
@method('PUT')
@csrf
  <div class="form-group row">
    <label  for="nombre" class="col-sm-1 col-form-label ">Nombre</label>
    <div class="col-sm-6">
      <input name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{$infoEmpleado->nombre}}" placeholder="Ingrese el nombre completo...">
    </div>
  </div>
  <div class="form-group row">
    <label  for="puesto" class="col-sm-1 col-form-label">Puesto</label>
    <div class="col-sm-6">
      <input name="puesto" type="text" class="form-control @error('puesto') is-invalid @enderror" value="{{$infoEmpleado->puesto}}" placeholder="Ingrese el puesto...">
    </div>
  </div>

  <div class="form-group row">
    <label  for="descripcion" class="col-sm-1 col-form-label">Descripción</label>
    <div class="col-sm-6">
      <textarea name="descripcion" type="text" class="form-control  @error('descripcion') is-invalid @enderror" placeholder="Ingrese aquí una breve descripción...">{{$infoEmpleado->descripcion}}</textarea>
    </div>
  </div>

  <div class="form-group row">
    <label  for="sueldo" class="col-sm-1 col-form-label">Sueldo</label>
    <div class="col-sm-6">
      <input name="sueldo" type="number" class="form-control  @error('sueldo') is-invalid @enderror" value="{{$infoEmpleado->sueldo}}" placeholder="Ingrese el sueldo...">
    </div>
  </div>

  <div class="form-group row">

      <button type="submit" class="btn btn-primary btn-block">Guardar</button>
  </div>
</form>

@endsection