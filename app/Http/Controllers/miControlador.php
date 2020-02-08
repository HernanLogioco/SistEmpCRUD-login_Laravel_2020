<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class miControlador extends Controller
{
  /**REDIRECCIONA AL LOGIN (ESTE MIDDLEWARE)PORQUE LAS RUTAS REQUIEREN AUTH 
     * SE INICIALIZA CON EL CONSTRUCTOR DE LA CLASE ANTES Q SE EJECUTEN LAS RUTAS
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function formNuevoEmp(){
      return view('nuevoEmpleado');
    }

    public function crearEmpleado(Request $request){
      //Probar lo que envio por formulario
      // return $request->all(); 
      $request->validate([ //validacion de los campos son requeridos...
        'nombre'=>['required','string', 'max:50'],
        'puesto'=>['required','alpha', 'max:255'], //alpha restringe a que sea solo texto con letras--> "alphabetic text"
        'sueldo'=>['required','max:5'],
        'descripcion'=>['max:255'],
      ]);

      $nuevoEmpleado=new App\Empleado; //creo una variable de tipo app\empleado (nuestro modelo)...para usar eloquent
      $nuevoEmpleado->nombre=$request->nombre;
      $nuevoEmpleado->puesto=$request->puesto;
      $nuevoEmpleado->sueldo=$request->sueldo;
      $nuevoEmpleado->descripcion=$request->descripcion;
      $nuevoEmpleado->save();
      return back()->with('mensaje','Empleado Agregado con Éxito! ');
    
    }
     public function eliminarEmpleado($id){
        $infoEmpleado=App\Empleado::findOrFail($id);
        $infoEmpleado->delete();
        return redirect()->route("home")->with('mensaje','Empleado Eliminado con Éxito!');
        
     }
     
     public function editarEmpleado($id){
      $infoEmpleado=App\Empleado::findOrFail($id);
      return view('editarEmpleado',compact('infoEmpleado'));
   }

     public function update(Request $request,$id){
      $request->validate([ //validacion de los campos son requeridos...
        'nombre'=>['required','string', 'max:50'],
        'puesto'=>['required','alpha', 'max:255'],
        'sueldo'=>['required','max:5'],
        'descripcion'=>['max:255'],
      ]);

        $updateEmpleado=App\Empleado::findOrFail($id);
        $updateEmpleado->nombre=$request->nombre;
        $updateEmpleado->puesto=$request->puesto;
        $updateEmpleado->sueldo=$request->sueldo;
        $updateEmpleado->descripcion=$request->descripcion;
        $updateEmpleado->save();
        return back()->with('mensaje','Empleado Editado con Éxito!');
      
      }

}
