<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Estudiante;
use Illuminate\Support\Facades\Redirect;
use Escuela\Http\Requests\EstudianteFormRequest;
use DB;

class EstudianteController extends Controller
{
     public function __construct()	//para validar
    {
        #$this->middleware('auth');
    }

    public function index()
    {
    	return view('datos.Estudiante.create');

    }

    public function create()
    {
   
    }

    public function store( EstudianteFormRequest $request)		//Para almacenar
    {
    	$alumno = new Estudiante;
    	$alumno -> nombre = $request -> get('nombreAlumno');
    	$alumno -> apellido = $request -> get('apellidoAlumno');
    	$alumno -> fechadenacimiento = $request -> get('fecha');
    	$alumno -> sexo = $request -> get('opciones');
    	$alumno -> discapacidad = $request -> get('opciones1');
    	$alumno -> domicilio = $request -> get('domicilio');
    	$alumno -> enfermedad = $request -> get('enfermedad');
    	$alumno -> zonaurbana = $request -> get('opciones4');
    	$alumno -> autorizavacuna = $request -> get('opciones3');
    	$alumno -> estado = $request -> get('estado');
    	$alumno -> id_partida = $request -> get('idPartida');
    	$alumno -> save();

    	return Redirect::to('datos/Estudiante');
    }

    public function show($id)		//Para mostrar
    {
    	
    }

    public function edit($id)
    {
    
    }

    public function update(TipoResponsableFormRequest $request, $id)
    {	
    
    }

    public function destroy($id)
    {

    }
}
