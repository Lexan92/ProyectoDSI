<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Matricula;
use Escuela\TipoResponsable;
use Escuela\Responsable;
use Escuela\Turno;
use Escuela\Seccion;
use Escuela\Grado;
use Escuela\Estudiante;
use Escuela\PartidaNacimiento;
use Escuela\DetalleGrado;
use Escuela\DetallePariente;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


use Escuela\Http\Requests\MatriculaFormRequest;
use Escuela\Http\Requests\DetalleParienteFormRequest;
use Escuela\Http\Requests\ResponsableFormRequest;

use Escuela\Http\Requests\TipoResponsableFormRequest;
use Escuela\Http\Requests\GradoFormRequest;
use Escuela\Http\Requests\DetalleGradoFormRequest;
use Escuela\Http\Requests\SeccionFormRequest;
use Escuela\Http\Requests\TurnoFormRequest;

#use Escuela\Http\Requests\EstudianteFormRequest;
#use Escuela\Http\Requests\PartidaNacimientoFormFormRequest;

use DB;


use Carbon\Carbon; //Para la zona fecha horaria
use Response;
use Illuminate\Support\Collection;  //Contienen los metodos a utilizar
use Illuminate\Database\Connection;

class MatriculaController extends Controller
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
    		$matriculas = DB::table('matricula as ma')
    		#->join('detalle_grado as dg','ma.iddetallegrado','=','dg.iddetallegrado')
    		#->join('estudiante as al','ma.nie','=','al.nie')
    		#->select('ma.id_matricula','al.nombre','ma.presentapartida','ma.certificadoprom','ma.presentafotos','ma.constanciaconducta','ma.eduacioninicial','ma.fechamatricula','ma.repitegrado','ma.fotografia','ma.estado','ma.cePrevio')
    		#->where('ma.id_matricula','LIKE','%'.$query.'%')
    		#->orderBy('i.id_matricula','desc')
    		#->groupBy('ma.id_matricula','al.nombre','ma.presentapartida','ma.certificadoprom','ma.presentafotos','ma.constanciaconducta','ma.eduacioninicial','ma.fechamatricula','ma.repitegrado','ma.fotografia','ma.estado','ma.cePrevio')
    		->paginate(7);
    		return view('expediente.matricula.index',["matriculas"=>$matriculas,"searchText"=>$query]);
    	}

    }


    public function create()
    {
    	$tipos = DB::table('tipo_responsable')->get();
    	$grados = DB::table('grado')->get();
    	$secciones = DB::table('seccion')->get();
    	$turnos = DB::table('turno')->get();
        $estudiantes = DB::table('estudiante')->get();
        $matriculas = DB::table('matricula')->get();

        #$matriculas = DB::table('matricula as mat')
        #->select(DB::raw('CONCAT(mat.id_matricula, " ", mat.estado) AS matricula'),'mat.id_matricula')
        #->where('mat.estado','=','Activo')
        #->get();

        #$raw=DB::raw("CONCAT(id_matricula, ' ', estado) as matricula");
        #$matriculas = Matricula::select($raw)->get();

    	return view("expediente.matricula.create",["tipos"=>$tipos, "grados"=>$grados, "secciones"=>$secciones, "turnos"=>$turnos, "estudiantes"=>$estudiantes, "matriculas"=>$matriculas]);
    }



    public function store (MatriculaFormRequest $request)
    {
    
    		$matricula = new Matricula;
    		$matricula->presentapartida=$request->get('presentapartida');
    		$matricula->certificadoprom=$request->get('certificadoprom');
    		$matricula->presentafotos=$request->get('presentafotos');
    		$matricula->constanciaconducta=$request->get('constanciaconducta');
    		$matricula->educacioninicial=$request->get('educacioninicial');
    		$matricula->fechamatricula=$request->get('fechamatricula');
    		$matricula->repitegrado=$request->get('repitegrado');
    		$matricula->estado='Activo';
    		$matricula->cePrevio=$request->get('cePrevio');

    		if(Input::hasFile('fotografia')){
    		$file = Input::file('fotografia');
    		$file -> move(public_path().'/imagenes/alumnos/', $file->getClientOriginalName());
    		$matricula->fotografia = $file->getClientOriginalName();
    	}

    		//Ahora se procede al tratamiento de DetalleGrado

    		$detalleGrado = new DetalleGrado();
    		$detalleGrado->idgrado = $request->get('idgrado');
	    	$detalleGrado->idseccion = $request->get('idseccion');
	    	$detalleGrado->idturno = $request->get('idturno');
	    	$detalleGrado->save();
    	
    		//Se hace la fk a la tabla matricula.

    		$matricula->iddetallegrado = $detalleGrado->iddetallegrado;

    		//Ahora de procede al tratamiento de Estudiante.

    		$partida = new PartidaNacimiento;
    		#$partida -> nie = 
    		$partida->folio = $request -> get('folio');
    		$partida->libro = $request -> get('libro');
    		$partida -> save();

    		//Se hace la fk a la tabla estudiante, una vez creada la partida.

    		$estudiante = new Estudiante;
    		$estudiante->nie = $request -> get('nie');
    		$estudiante->id_partida = $partida->id_partida;
    		$estudiante->nombre = $request -> get('nombre');
    		$estudiante->apellido = $request -> get('apellido');
    		$estudiante->fechadenacimiento = $request -> get('fechadenacimiento');
    		$estudiante ->sexo = $request -> get('sexo');
    		$estudiante ->discapacidad = $request -> get('discapacidad');
    		$estudiante ->domicilio = $request -> get('domicilio');
    		$estudiante ->enfermedad = $request -> get('enfermedad');
    		$estudiante ->zonahabitacion = $request -> get('zonahabitacion');
    		$estudiante ->autorizavacuna = $request -> get('autorizavacuna');
    		$estudiante ->estado = 'Activo';
    		$estudiante -> save();

    		//Se procede a guardar el nie
    		$partida->nie = $estudiante->nie;
    		$partida->save();

    		//Se procede a guardar datos de la Madre

    		$madre = new Responsable;
    		$madre->idresponsable=1;
    		$madre->nie=$estudiante->nie;
    		$madre->nombre =$request->get('nombre2');
    		$madre->apellido =$request->get('apellido2');
    		$madre->ocupacion =$request->get('ocupacion');
    		$madre->lugardetrabajo =$request->get('lugardetrabajo');
    		$madre->telefono =$request->get('telefono');
    		$madre->dui =$request->get('dui');
    		$madre->save();

            
            //Se procede a guardar datos de la Padre
            $padre = new Responsable;
            $padre->idresponsable=2;
            $padre->nie=$estudiante->nie;
            $padre->nombre =$request->get('nombre3');
            $padre->apellido =$request->get('apellido3');
            $padre->ocupacion =$request->get('ocupacion3');
            $padre->lugardetrabajo =$request->get('lugardetrabajo3');
            $padre->telefono =$request->get('telefono3');
            $padre->dui =$request->get('dui3');
            $padre->save();


            //Se procede a guardar datos del Contacto de Emergencia
            $contacto = new Responsable;
            $contacto->idresponsable=3;
            $contacto->nie=$estudiante->nie;
            $contacto->nombre =$request->get('nombre4');
            $contacto->apellido =$request->get('apellido4');
            $contacto->ocupacion =$request->get('ocupacion4');
            $contacto->lugardetrabajo =$request->get('lugardetrabajo4');
            $contacto->telefono =$request->get('telefono4');
            $contacto->dui =$request->get('dui4');
            $contacto->save();
        
        
    		//Se procede a guardar la matricula
    		$matricula->nie = $estudiante->nie;
    		#$matricula -> save();


            $id_matricula = $request->get('id_matricula');
            $nie = $estudiante->nie;
            $parentesco = $request->get('parentesco');


            $cont = 0;

            while ( $cont < count($id_matricula)) {
                $detalle = new DetallePariente();
                $detalle->nie = $estudiante->nie;
                $detalle->id_matricula = $id_matricula[$cont];
                $detalle->parentesco = $parentesco[$cont];
                $detalle->save();  
                $cont =$cont+1;
            }

            $matricula -> save();    		

    	return Redirect::to('expediente/matricula');
    }

    public function show($id)		//Para mostrar
    {
    	return view("expediente.matricula.show",["matricula"=>Matricula::findOrFail($id)]);
    }

    public function edit($id)
    {
    	$matricula = Matricula::findOrFail($id);
    	$tipos = DB::table('tipo_responsable')->get();
    	$grados = DB::table('grado')->get();
    	$secciones = DB::table('seccion')->get();
    	$turnos = DB::table('turno')->get();
    	return view("expediente.matricula.edit",["matricula"=>$matricula, "tipos"=>$tipos, "grados"=>$grados, "secciones"=>$secciones, "turnos"=>$turnos]);
    }


    public function update(MatriculaFormRequest $request, $id)
    {	
    	$matricula = Matricula::findOrFail($id);

    	//TODO LO DEL METODO STORE

    	$matricula -> update();

    	return Redirect::to('expediente/matricula');
    }


    public function destroy($id)
    {
    	$matricula=Matricula::findOrFail($id);
    	$matricula->estado = 'Inactivo';
    	$matricula->update();
    	return Redirect::to('expediente/matricula');
    }

}
