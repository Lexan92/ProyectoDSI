@extends ('layouts.admin')
@section('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Formulario de Matricula</a></h2>
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
	</div>
</div>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Datos Estudiante</a></h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		{!!Form::open(array('url'=>'datos/Estudiante','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

		<div class="form-group">
			<label>Nombres</label>
			<input type="text" class="form-control" name="nombreAlumno" placeholder="Nombres Completos"required>
		</div>

		<div class="form-group">
			<label>Apellidos</label>
			<input type="text" class="form-control" name="apellidoAlumno" placeholder="Apellidos Completos"  required="">
		</div>

		<div class="form-group">
			<label>Fecha de Nacimiento</label>
			<input type="text" class="form-control" name="fecha" placeholder="AAAA-MM-DD">
		</div>

		<div class="form-group">
			<label>Domicilio</label>
			<input type="text" class="form-control" name="domicilio" placeholder="Direccion Actual del estudiante">
		</div>

		<div class="form-group">
			<label>Sexo</label></br>
			<label><input type="radio"  name="opciones" id="opc1" value="F" checked> Femenino</label>
		</div>

		<div class="form-group">
			
			<label><input type="radio"  name="opciones" id="opc1" value="M"> Masculino</label>
		</div>

		<div class="form-group">
			<label>¿Tiene discapacidad?</label></br>
			<label><input type="radio"  name="opciones1" id="opc2" value="0" checked> NO</label>
		</div>

		<div class="form-group">
			
			<label><input type="radio"  name="opciones1" id="opc2" value="1"> SI</label>
		</div>

			<div class="form-group">
			<label>Nombre del Contacto de Emergencia</label>
			<input type="text" class="form-control" name="nombreEmergencia" placeholder="Nombre Completo">
			</div>
			<div class="form-group">
			<label>Numero del Contacto de Emergencia</label>
			<input type="text" class="form-control" name="numeroEmergencia" placeholder="Numero de linea fija del contacto de emergencia">
		</div>

		<div class="form-group">
		<label>Escriba la enfermedad que padezca el estudiante</label>
			<input type="text" class="form-control" name="enfermedad" placeholder="Introduzca el nombre de la enfermedad">
		</div>

		<div class="form-group">
			<label>Autorizacion de Vacunacion</label></br>
			<label><input type="radio"  name="opciones3" id="opc3" value="1" checked> SI</label>
		</div>

		<div class="form-group">
			
			<label><input type="radio"  name="opciones3" id="opc3" value="0"> NO</label>
		</div>

		<div class="form-group">
		<label>Reside en Area Urbana</label></br>
			<label><input type="radio"  name="opciones4" id="opc4" value="1" checked> SI</label>
		</div>

		<div class="form-group">
			<label><input type="radio"  name="opciones4" id="opc4" value="0"> NO</label>
		</div>

		<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Datos de la Madre de Familia</a></h3>
		
	</div>
</div>
<div class="form-group">
			<label>Nombres de la Madre</label>
			<input type="text" class="form-control" name="nombreMadre" placeholder="Nombres Completos">
		</div>

		<div class="form-group">
			<label>Apellidos de la Madre</label>
			<input type="text" class="form-control" name="apellidoMadre" placeholder="Apellidos Completos">
		</div>
		<div class="form-group">
			<label>DUI de la Madre</label>
			<input type="text" class="form-control" name="duiMadre" placeholder="DUI sin guiones">
		</div>
		<div class="form-group">
			<label>Ocupacion de la Madre</label>
			<input type="text" class="form-control" name="ocupacionMadre" placeholder="Ocupacion que ejerce la Madre">
		</div>
		<div class="form-group">
			<label>Lugar de trabajo</label>
			<input type="text" class="form-control" name="trabajoMadre" placeholder="Nombre de la empresa o sitio donde actualmente trabaja">
		</div>
		<div class="form-group">
			<label>Telefono de contacto de la Madre</label>
			<input type="text" class="form-control" name="telefonoMadre" placeholder="Telefono principal de contacto">
		</div>



	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Datos del Padre de Familia</a></h3>
	</div>
	</div>
		<div class="form-group">
			<label>Nombres Del Padre</label>
			<input type="text" class="form-control" name="nombrePadre" placeholder="Nombres Completos">
		</div>

		<div class="form-group">
			<label>Apellidos del Padre</label>
			<input type="text" class="form-control" name="apellidoPadre" placeholder="Apellidos Completos">
		</div>

		<div class="form-group">
			<label>DUI del Padre</label>
			<input type="text" class="form-control" name="duiMadre" placeholder="DUI sin guiones">
		</div>

		<div class="form-group">
			<label>DUI del Padre</label>
			<input type="text" class="form-control" name="duiPadre" placeholder="DUI sin guiones">
		</div>
		<div class="form-group">
			<label>Ocupacion del Padre</label>
			<input type="text" class="form-control" name="ocupacionPadre" placeholder="Ocupacion que ejerce el Padre">
		</div>
		<div class="form-group">
			<label>Lugar de trabajo</label>
			<input type="text" class="form-control" name="trabajoPadre" placeholder="Nombre de la empresa o sitio donde actualmente trabaja">
		</div>
		<div class="form-group">
			<label>Telefono de contacto del Padre</label>
			<input type="text" class="form-control" name="telefonoPadre" placeholder="Telefono principal de contacto">
		</div>

		<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
		{!!Form::close()!!}
	</div>
</div>

@endsection