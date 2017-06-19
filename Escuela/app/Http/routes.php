
<?php
use Escuela\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;







//GRUPO DE URL DE USUARIO SIN LOGEARSE
Route::group(['middleware' => 'guest'], function () {
  
  Route::get('/', 'Auth\AuthController@getLogin');
	Route::get('login', 'Auth\AuthController@getLogin');
	Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']); 
 
 /*DESCOMENTAR ESTE GRUPO DE RUTAS CUANDO SE QUIERA AGREAGAR EL PRIMER USUARIO EN LA BASE DE DATOS*/
  /*Route::get('register', 'Auth\AuthController@getRegister');
    Route::get('register', 'Auth\AuthController@tregistro'); 
    Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);*/

});







//GRUPO DE URLS LOGEADOS 

Route::group(['middleware' => 'auth'], function () {
	  Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']); 

});










//grupo de rutas de usuario administrador
   
Route::group(['middleware' => 'usuarioAdmin'], function () {
      
      Route::get('form_nuevo_usuario', ['as' => 'form_nuevo_usuario', 'uses' => 'UsuariosController@form_nuevo_usuario']);
      Route::post('agregar_nuevo_usuario', 'UsuariosController@agregar_nuevo_usuario');
      Route::get('listado_usuarios/{page?}', ['as' => 'listado_usuarios/{page?}', 'uses' => 'UsuariosController@listado_usuarios']);
      Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
    /*Route::post('editar_usuario', 'UsuariosController@editar_usuario');*/





     //COLOCAR SUS RUTAS ACA PARA USUARIO ADMIN



















      //CREACION DE BOTON ELIMINAR MEDIANTE RUTA 
      Route::delete('eliminar/{id}',  function ($id){
           User::find($id)->delete();
           return redirect('listado_usuarios/{page?}');
      });

      //BOTON EDITAR MEDIANTE RUTA 
      Route::put('editar_usuario/{id}',  function (Request $request, $id){
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
     
 

<<<<<<< HEAD
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

<<<<<<< HEAD

Route::group(['middleware' => 'guest'], function () {//GRUPO DE URL DE USUARIO SIN LOGEARSE
    //FUNCIONAN 
  Route::get('/', 'Auth\AuthController@getLogin');
	Route::get('login', 'Auth\AuthController@getLogin');
	Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']); 

     /*Route::get('register', 'Auth\AuthController@getRegister');
    Route::get('register', 'Auth\AuthController@tregistro'); 
    Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);*/
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
      Route::post('editar_usuario', 'UsuariosController@editar_usuario');

      Route::resource('datos/tipoResponsable','TipoResponsableController');
Route::resource('datos/Responsable','ResponsableController');
Route::resource('datos/Estudiante','EstudianteController');
Route::resource('detalle/grado','GradoController');
Route::resource('detalle/seccion','SeccionController');
Route::resource('detalle/turno','TurnoController');
Route::resource('datos/Partida','PartidaController');
      
});


//grupo de rutas para usuario standar

Route::group(['middleware' => 'usuarioStandard'], function () { 
     
 

});


=======
Route::get('/', function () {
    return view('welcome');
});

>>>>>>> 65156a4e391c229798a5858dbe77697815631d2f
=======
});





>>>>>>> b5570a204ed001ff38b0c7db73423c8642ef5159
Route::resource('datos/tipoResponsable','TipoResponsableController');
Route::resource('datos/Responsable','ResponsableController');
Route::resource('datos/Estudiante','EstudianteController');
Route::resource('detalle/grado','GradoController');
Route::resource('detalle/seccion','SeccionController');
Route::resource('detalle/turno','TurnoController');
<<<<<<< HEAD
<<<<<<< HEAD
Route::resource('expediente/matricula','MatriculaController');
Route::resource('datos/Partida','PartidaController');

=======
Route::resource('expediente/matricula','MatriculaController');		 //Nuevo Ingreso
Route::resource('expediente/matricula2','Matricula2Controller');	//Antiguo Ingreso
>>>>>>> 65156a4e391c229798a5858dbe77697815631d2f
=======
Route::resource('expediente/matricula','MatriculaController');

>>>>>>> b5570a204ed001ff38b0c7db73423c8642ef5159
