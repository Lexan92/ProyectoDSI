<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

class PartidaController extends Controller
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
        $usuarioactual=\Auth::user();
       
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
        $usuarioactual=\Auth::user();
        $partida = new PartidaNacimiento;
        $partida->folio=$request->get('folio');
        $partida->libro=$request->get('libro');

        if(Input::hasFile('imagen'))
        {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/alumnos/',$file->getClientOriginalName());
            $partida->copiapartida=$file->getClientOriginalName();    
        }

        $partida->save();
        return Redirect::to('datos/Partida');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
