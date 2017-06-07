<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

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

    public function store( TipoResponsableFormRequest $request)		//Para almacenar
    {
    
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
