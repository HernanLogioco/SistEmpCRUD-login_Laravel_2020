<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class HomeController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**REDIRECCIONA AL LOGIN PORQUE LAS RUTAS REQUIEREN AUTH 
     * SE INICIALIZA CON EL CONSTRUCTOR DE LA CLASE ANTES Q SE EJECUTEN LAS RUTAS
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id=null){
        // Muesstra todo los empleados de la BD $empleados=App\Empleado::all();
        $empleados=App\Empleado::paginate(10); //Muestra solo 5 empleados en la tabla para la paginacion...
        $admin=auth()->user()->email_verified_at;
        if($id!=null){
        $infoEmpleado=App\Empleado::findOrFail($id);
        return view('home', compact('empleados','infoEmpleado'));
        }else {
            return view('home',compact('empleados'));
        }
        
    }

    
}
