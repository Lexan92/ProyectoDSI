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
       $usuarioactual=\Auth::user();
		
	
		
    	if($request)
    	{
            //los query capturan los criterios de busqueda que son enviados desde el search.blade de estudiante
    	    $query1 = trim($request->get('searchNombre'));
            $query2 = trim($request->get('searchApellido'));
            $query3 = trim($request->get('searchNie'));
            #$query4 = $request->get('fechamatricula');
            $query5 = $request->get('idgrado');
            $query6 = $request->get('idseccion');
            $query7 = $request->get('idturno');
          
          //la consulta es guardada en la variable $est recordar que join
          //genera una nueva tabla con todos las columnas especificada en el select
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

<<<<<<< HEAD
<<<<<<< HEAD
            //se retorna el array de resultados a la vista en una variable "estudiantes" y ademas los catalogos de turno,seccion y grado
            return view('datos.Estudiante.index',["estudiantes"=>$est,"searchNombre"=>$query1,"searchApellido"=>$query2,"searchNie"=>$query3, "grados"=>$grados, "secciones"=>$secciones, "turnos"=>$turnos,"usuarioactual"=>$usuarioactual]);
=======

            return view('datos.Estudiante.index',["estudiantes"=>$est,"searchText"=>$query]);
>>>>>>> 65156a4e391c229798a5858dbe77697815631d2f
=======
            //se retorna el array de resultados a la vista en una variable "estudiantes" y ademas los catalogos de turno,seccion y grado
            return view('datos.Estudiante.index',["estudiantes"=>$est,"searchNombre"=>$query1,"searchApellido"=>$query2,"searchNie"=>$query3, "grados"=>$grados, "secciones"=>$secciones, "turnos"=>$turnos]);
>>>>>>> b5570a204ed001ff38b0c7db73423c8642ef5159

    	}
    	

    }

    public function create()
    {
   
    }

    public function store( EstudianteFormRequest $request)		//Para almacenar
    {
  
    }

    public function show($id)		//Para mostrar
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $usuarioactual=\Auth::user();
		
		
    	return view("datos.Estudiante.show",["estudiante"=>Estudiante::findOrFail($id),"usuarioactual"=>$usuarioactual]);
=======
    	#return view("datos.Estudiante.show",["nie"=>Estudiante::findOrFail($id)]);
>>>>>>> 65156a4e391c229798a5858dbe77697815631d2f
=======
    	return view("datos.Estudiante.show",["estudiante"=>Estudiante::findOrFail($id)]);
>>>>>>> b5570a204ed001ff38b0c7db73423c8642ef5159
    }

    public function edit($id)
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $usuarioactual=\Auth::user();
		
=======
>>>>>>> b5570a204ed001ff38b0c7db73423c8642ef5159
        //catalogos de grados,secciones y turnos
        $grados = DB::table('grado')->get();
    	$secciones = DB::table('seccion')->get();
    	$turnos = DB::table('turno')->get();

        

<<<<<<< HEAD
        return view("datos.Estudiante.edit",["estudiante"=>Estudiante::findOrFail($id), "grados"=>$grados, "secciones"=>$secciones, "turnos"=>$turnos,"usuarioactual"=>$usuarioactual]);
=======
        return view("datos.Estudiante.edit",["estudiante"=>Estudiante::findOrFail($id)]);
>>>>>>> 65156a4e391c229798a5858dbe77697815631d2f
=======
        return view("datos.Estudiante.edit",["estudiante"=>Estudiante::findOrFail($id), "grados"=>$grados, "secciones"=>$secciones, "turnos"=>$turnos]);
>>>>>>> b5570a204ed001ff38b0c7db73423c8642ef5159
    }
    
    
    
<<<<<<< HEAD
<<<<<<< HEAD
    public function update(Request $request, $id)
    {	
        $usuarioactual=\Auth::user();
		

        $estudiante = Estudiante::findOrFail($id);
        $estudiante-> nombre = $request->get('nombre');
        $estudiante-> apellido = $request->get('apellido');
       #$estudiante-> nie = $request->get('nie');
        $estudiante-> fechadenacimiento = $request->get('fechadenacimiento');
        $estudiante-> domicilio = $request->get('domicilio');
        $estudiante-> enfermedad = $request->get('enfermedad');

        if ($request->get('zonaurbana')==1) {
            $estudiante-> zonaurbana = true;
        } else {
            $estudiante-> zonaurbana = false;
        }
        
        
        $estudiante-> sexo = $request->get('sexo');

        if ($request->get('discapacidad')==1) {
            $estudiante-> discapacidad = true;
        } else {
            $estudiante-> discapacidad = false;
        }
        
        
        if ($request->get('autorizavacuna')==1) {
           $estudiante-> autorizavacuna = true;
        } else {
            $estudiante-> autorizavacuna = false;
        }
        
        
        $estudiante-> estado = true;
        $estudiante->update();
        //se redirecciona al perfil actual del estudiante
        return Redirect::to('datos/Estudiante/'.$id);
=======

    public function update(TipoResponsableFormRequest $request, $id)
    {	
    
>>>>>>> 65156a4e391c229798a5858dbe77697815631d2f
=======
#AUN QUEDA POR RESOLVER EL CONTROL DEL ESTUDIANTEFORMREQUEST
    public function update(Request $request, $id)
    {	
        $estudiante = Estudiante::findOrFail($id);
        $estudiante-> nombre = $request->get('nombre');
        $estudiante-> apellido = $request->get('apellido');
       #$estudiante-> nie = $request->get('nie');
        $estudiante-> fechadenacimiento = $request->get('fechadenacimiento');
        $estudiante-> domicilio = $request->get('domicilio');
        $estudiante-> enfermedad = $request->get('enfermedad');

        if ($request->get('zonaurbana')==1) {
            $estudiante-> zonaurbana = true;
        } else {
            $estudiante-> zonaurbana = false;
        }
        
        
        $estudiante-> sexo = $request->get('sexo');

        if ($request->get('discapacidad')==1) {
            $estudiante-> discapacidad = true;
        } else {
            $estudiante-> discapacidad = false;
        }
        
        
        if ($request->get('autorizavacuna')==1) {
           $estudiante-> autorizavacuna = true;
        } else {
            $estudiante-> autorizavacuna = false;
        }
        
        
        $estudiante-> estado = true;
        $estudiante->update();
        //se redirecciona al perfil actual del estudiante
        return Redirect::to('datos/Estudiante/'.$id);
>>>>>>> b5570a204ed001ff38b0c7db73423c8642ef5159
    }

    public function destroy($id)
    {

    }
}
