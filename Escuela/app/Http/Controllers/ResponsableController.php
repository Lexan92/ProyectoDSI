<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Responsable;
use Illuminate\Support\Facades\Redirect;
use Escuela\Http\Request\ResponsableFormRequest;
use DB;

class ResponsableController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        #$query = $request->get('nie');
        $res= DB::table('responsable')
        ->select('responsable.nombre','tipo_responsable.nombretipo','responsable.apellido','responsable.telefono','responsable.nie','responsable.id_persona')
        ->join('tipo_responsable as tipo_responsable','tipo_responsable.idresponsable','=','responsable.idresponsable','full outer')
        ->where('responsable.nie',$id)
        ->get();
        return view('datos.Responsable.show',["responsables"=>$res]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("datos.Responsable.edit",["responsable"=>Responsable::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $responsable= Responsable::findOrFail($id);
        #$responsable->idresponsable = $request->get('idresponsable');
        #$responsable->nie = $request->get('nie');
        $responsable->nombre = $request->get('nombre');
        $responsable->apellido = $request->get('apellido');
        $responsable->ocupacion = $request->get('ocupacion');
        $responsable->lugardetrabajo = $request->get('lugardetrabajo');
        $responsable->telefono = $request->get('telefono');
        $responsable->dui = $request->get('dui');
        $responsable->update();

        return Redirect::to('datos/Estudiante/'.$responsable->nie);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
