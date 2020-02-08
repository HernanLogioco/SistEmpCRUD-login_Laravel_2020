@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
                <div class="alert alert-success text-dark font-weight-bolder">Bienvenido! <span class="text-capitalize text-dark">★&nbsp{{auth()->user()->name}}&nbsp★</span></div>
        </div>
    </div>

<div class="container mt-2">
<h3 class="display-4 text-center text-primary">Sistema de Gestión RRHH</h1>
@if(session('mensaje'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{session('mensaje')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="card">
<div class="card-header d-flex justify-content-between align-items-center">
<span>Gestión de Recursos Humanos</span>
<a class="btn btn-primary btn-sm" href="{{route('nuevoEmpleado')}}">Agregar Empleado</a> 
</div>

</div>
<table class="table border text-center">
  <thead class="thead-dark ">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Puesto</th>
      <th scope="col">Sueldo</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>
 
    @foreach($empleados as $item) 
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td><a href="{{route('home',$item)}}" class="class text-info font-weight-bold">{{$item->nombre}}</a></td>
      <td>{{$item->puesto}}</td>
      <td>${{$item->sueldo}}</td>
      <td><a href="{{route('editarEmp',$item)}}" class="btn btn-warning btn-sm mr-2" >Modificar</a>
          <a href="{{route('eliminarEmp',$item)}}" class="btn btn-danger btn-sm ml-2">Eliminar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<!-- PAGINACION --> {{$empleados ?? ''->links()}}


@if(!empty($infoEmpleado))<!--Mostrar descripcion de empleado-->
<div class="card">
  <h5 class="card-header bg-dark text-white text-center">Empleado Nro: <strong class="text-warning ">{{$infoEmpleado->id}}&nbsp &nbsp{{$infoEmpleado->nombre}}</strong> </h5>
  <div class="card-body">
    <h5 class="card-title text-danger">Descripción</h5>
    
    @if ($infoEmpleado->descripcion)
      <p class="card-text">{{$infoEmpleado->descripcion}}</p>
      
    @else
      <p class="card-text">Sin descripción...</p>
    

    
    
    
    @endif
    
    <a href="#" class="btn btn-primary">Mas info</a>
  </div>
</div>
  @endif
</div>
@endsection