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
    	    $query1 = trim($request->get('searchNombre'));
            $query2 = trim($request->get('searchApellido'));
            $query3 = trim($request->get('searchNie'));
            #$query4 = $request->get('fechamatricula');
            $query5 = $request->get('idgrado');
            $query6 = $request->get('idseccion');
            $query7 = $request->get('idturno');
          
    		$est = DB::table('estudiante')
            ->select('estudiante.nombre','estudiante.apellido','estudiante.nie','matricula.nie','grado.nombreGrado','seccion.nombreSeccion')
            ->join('matricula as matricula','estudiante.nie','=','matricula.nie','full outer')
            ->join('detalle_grado as detalle_grado','matricula.iddetallegrado','=','detalle_grado.iddetallegrado','full outer')
            ->join('grado as grado','detalle_grado.idgrado','=','grado.idgrado','full outer')
            ->join('seccion as seccion','detalle_grado.idseccion','=','seccion.idseccion','full outer')
            
            ->where('estudiante.nombre',$query1)
            ->orWhere('estudiante.apellido',$query2)
            #->orWhere('matricula.fechamatricula',$query4)
            ->orWhere('grado.idgrado',$query5)
            #->orWhere('estudiante.nie',$query3)
            ->get();
        //catalogos de grados,secciones y turnos
        $grados = DB::table('grado')->get();
    	$secciones = DB::table('seccion')->get();
    	$turnos = DB::table('turno')->get();


            return view('datos.Estudiante.index',["estudiantes"=>$est,"searchNombre"=>$query1,"searchApellido"=>$query2,"searchNie"=>$query3, "grados"=>$grados, "secciones"=>$secciones, "turnos"=>$turnos]);

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
    	return view("datos.Estudiante.show",["estudiante"=>Estudiante::findOrFail($id)]);
    }

    public function edit($id)
    {
        //catalogos de grados,secciones y turnos
        $grados = DB::table('grado')->get();
    	$secciones = DB::table('seccion')->get();
    	$turnos = DB::table('turno')->get();

        

        return view("datos.Estudiante.edit",["estudiante"=>Estudiante::findOrFail($id), "grados"=>$grados, "secciones"=>$secciones, "turnos"=>$turnos]);
    }
    
    
    

    public function update(EstudianteFormRequest $request, $id)
    {	
        $estudiante = Estudiante::findOrFail($id);
        $estudiante-> nombre = $request->get('nombre');
        $estudiante-> apellido = $request->get('apellido');
       # $estudiante-> nie = $request->get('nie');
        $estudiante-> fechadenacimiento = $request->get('fechadenacimiento');
        $estudiante-> domicilio = $request->get('domicilio');
        $estudiante-> enfermedad = $request->get('enfermedad');
        $estudiante-> zonaurbana = $request->get('zonahabitacion');
        $estudiante-> sexo = $request->get('sexo');
        $estudiante-> discapacidad = $request->get('discapacidad');
        $estudiante-> autorizavacuna = $request->get('autorizavacuna');
        $estudiante-> estado = true;
        $estudiante->update();

        return Redirect::to('datos/Estudiante');
    }

    public function destroy($id)
    {

    }
}
