
<?php
use Escuela\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'guest'], function () {//GRUPO DE URL DE USUARIO SIN LOGEARSE
    //FUNCIONAN 


  Route::get('/', 'Auth\AuthController@getLogin');
	Route::get('login', 'Auth\AuthController@getLogin');
	Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']); 

});


   Route::group(['middleware' => 'auth'], function () {//GRUPO DE URLS LOGEADOS
//FUNCIONAN
	  Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);  
//FUNCIONAN

    /*Route::get('register', 'Auth\AuthController@getRegister');
    Route::get('register', 'Auth\AuthController@tregistro'); 
    Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);*/
	
Route::resource('datos/tipoResponsable','TipoResponsableController');
Route::resource('datos/Responsable','ResponsableController');
Route::resource('datos/Estudiante','EstudianteController');
Route::resource('detalle/grado','GradoController');
Route::resource('detalle/seccion','SeccionController');
Route::resource('detalle/turno','TurnoController');
Route::resource('expediente/matricula','MatriculaController');

});



//grupo de rutas de usuario administrador
   
      Route::group(['middleware' => 'usuarioAdmin'], function () {
      
      Route::get('form_nuevo_usuario', ['as' => 'form_nuevo_usuario', 'uses' => 'UsuariosController@form_nuevo_usuario']);
      Route::post('agregar_nuevo_usuario', 'UsuariosController@agregar_nuevo_usuario');
      Route::get('listado_usuarios/{page?}', ['as' => 'listado_usuarios/{page?}', 'uses' => 'UsuariosController@listado_usuarios']);
      Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
      /*Route::post('editar_usuario', 'UsuariosController@editar_usuario');*/
      Route::delete('eliminar/{id}',  function ($id){
           User::find($id)->delete();
           return redirect('listado_usuarios/{page?}');
      });
      Route::put('editar_usuario/{id}',  function (Request $request, $id){
        /* $data=$request->all();
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
                                            ->with("errors",$errores);    */           
        

           $usuario = User::find($id);
           $usuario->name  =   $request->name;
           $usuario->email=  $request->email;
           $usuario->tipoUsuario=  $request->tipoUsuario;
           $usuario->password=  $request->password;
           $usuario->save();

           return redirect('listado_usuarios/{page?}');
      });
      
});


//grupo de rutas para usuario standar

Route::group(['middleware' => 'usuarioStandard'], function () { 
     
 

});


Route::resource('datos/tipoResponsable','TipoResponsableController');
Route::resource('datos/Responsable','ResponsableController');
Route::resource('datos/Estudiante','EstudianteController');
Route::resource('detalle/grado','GradoController');
Route::resource('detalle/seccion','SeccionController');
Route::resource('detalle/turno','TurnoController');
Route::resource('expediente/matricula','MatriculaController');

