@extends ('layouts.admin')
@section('contenido')


<div class="col-md-12 col-md-offset-0">
    <legend class="the-legend"><h1 style="text-align: center;">Perfil de Estudiante</h1></legend>
        </div>
    <div><label><h2>{{$estudiante->nombre}} {{$estudiante->apellido}}    {{$estudiante->nie}}</h2></label></div>     

	

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{asset('imagenes/menus/notes.png')}}" alt="...">
      <div class="caption">
      
        <p>
          <a href="{{URL::action('EstudianteController@edit',$estudiante->nie)}}"
           class="btn btn-primary" role="button">Editar Datos Personales</a>
       
        </p>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{asset('imagenes/menus/notes.png')}}" alt="...">
      <div class="caption">
      
        <p>
          <a href="{{URL::action('ResponsableController@edit',$estudiante->nie)}}"
           class="btn btn-primary" role="button">Editar Informacion Parental</a>
       
        </p>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{asset('imagenes/menus/notes.png')}}" alt="...">
      <div class="caption">
      
        <p>
          <a href="{{URL::action('EstudianteController@show',$estudiante->nie)}}"
           class="btn btn-primary" role="button">Editar Partida de Nacimiento</a>
       
        </p>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{asset('imagenes/menus/notes.png')}}" alt="...">
      <div class="caption">
      
        <p>
          <a href="{{URL::action('MatriculaController@edit',$estudiante->nie)}}"
           class="btn btn-primary" role="button">Editar Matricula</a>
       
        </p>
      </div>
    </div>
  </div>

</div>

@endsection