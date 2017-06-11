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

    public function index(Request $request)
    {
    	if($request)
    	{
    	    $query = trim($request->get('searchText'));
    		$est = DB::table('estudiante')
            ->join('matricula','estudiante.nie','=','matricula.nie','full outer')
            ->where('estudiante.nombre',$query)
            ->get();
            return view('datos.Estudiante.index',["estudiantes"=>$est,"searchText"=>$query]);

    	}
    	

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


    	$partida = new PartidaNacimiento;
    	$partida -> nie = $alumno->nie;
    	$partida -> folio = $request ->get('folio');
    	$partida -> libro = $request ->get('libro');
    	$partida -> copiapartida =$request -> get('imagenPartida');
    	$partida -> save();

    	$responsable = new Responsable;
    	$responsable -> id_responsable = $request-> get('idResponsable');
    	$responsable -> nie = $alumno ->nie;
    	$responsable -> nombre = $request -> get('nombreMadre');
    	$responsable -> apellido = $request-> get('apellidoMadre');
    	


    	return Redirect::to('datos/Estudiante');
    }

    public function show($id)		//Para mostrar
    {
    	#return view("datos.Estudiante.show",["nie"=>Estudiante::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("datos.Estudiante.edit",["estudiante"=>Estudiante::findOrFail($id)]);
    }
    
    
    

    public function update(TipoResponsableFormRequest $request, $id)
    {	
    
    }

    public function destroy($id)
    {

    }
}
