<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;
use Escuela\User;
use Storage;

use Escuela\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Excel;
use Escuela\Pais;
use Escuela\TipoUsuario;
use Escuela\Educacion;
use Escuela\TipoEducacion;
use Escuela\Publicaciones;
use Escuela\TipoPublicaciones;
use Escuela\Proyectos;
use Escuela\Http\Requests\UsuarioRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

private $path = 'user';

    public function index()
    {
        $data = User::all();
//Enviamos esos registros a la vista.

       return view($this->path.'.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposusuario=TipoUsuario::all();
        return view($this->path.'.create')->with("tiposusuario",$tiposusuario);;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $data=$request->all();


        $reglas = array(
                         'name' => 'required|Unique:users',
                         'email' => 'required|Email|Unique:users',
                         'tipoUsuario' => 'required|Numeric|min:1|max:2',
                        );
        $mensajes= array(
                         'name.required' =>  'Ingresar Nombres es obligatorio',
                         'name.unique' =>  'Ya existe el Usuario, favor ingresar otro nombre',
                         'email.required' =>  'Ingresar un email es obligatorio',
                         'email.email' =>  'el email debe tener un formato valido',
                         'email.unique' =>  'el email debe ser unico en la base de datos',
                         
                         'tipoUsuario.numeric' =>  'Ingresar un tipo de usuario valido',
                         );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
        {
             $errores = $validacion->errors(); 
             return new JsonResponse($errores, 422); 
             /*return view("mensajes.msj_rechazado")->with("msj","Existen errores de validación")
                                                  ->with("errors",$errores);*/                    
        }



        $usuario= new User;
        $usuario->name  =  $data['name'];
        $usuario->email=$data['email'];
        $usuario->tipoUsuario=$data['tipoUsuario'];
        $usuario->password=bcrypt($data['password']);

        $resul= $usuario->save();

        if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Usuario Registrado Correctamente");   
        }
        else
        {
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

        }
        
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
        $user = User::findOrFail($id);
        
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
