@extends ('layouts.admin')
@section('contenido')

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
		{!!Form::open(array('url'=>'expediente/matricula','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

        <div class="form-group">
			<label>NIE</label>
			<input type="numeric" value="111" class="form-control" name="nie" placeholder="NIE"required>
		</div>
		<div class="form-group">
			<label>Nombres</label>
			<input type="text" value="111" class="form-control" name="nombre" placeholder="Nombres Completos"required>
		</div>

		<div class="form-group">
			<label>Apellidos</label>
			<input type="text" value="111" class="form-control" name="apellido" placeholder="Apellidos Completos"  required="">
		</div>

		<div class="form-group">
			<label>Fecha de Nacimiento</label>
			<input type="date" class="form-control" name="fechadenacimiento" placeholder="AAAA-MM-DD">
		</div>

		<div class="form-group">
			<label>Domicilio</label>
			<input type="text" value="111" class="form-control" name="domicilio" placeholder="Direccion Actual del estudiante">
		</div>

		<div class="form-group">
			<label>Sexo</label></br>
			<label><input type="radio"  name="sexo" id="opc1" value="F" checked> Femenino</label>
		</div>

		<div class="form-group">
			
			<label><input type="radio"  name="sex" id="opc1" value="M"> Masculino</label>
		</div>

		<div class="form-group">
			<label>¿Tiene discapacidad?</label></br>
			<label><input type="radio"  name="discapacidad" id="opc2" value="0" checked> NO</label>
		</div>

		<div class="form-group">
			
			<label><input type="radio"  name="discapacida" id="opc2" value="1"> SI</label>
		</div>

		<div class="form-group">
		<label>Escriba la enfermedad que padezca el estudiante</label>
			<input type="text" value="111" class="form-control" name="enfermedad" placeholder="Introduzca el nombre de la enfermedad">
		</div>

		<div class="form-group">
			<label>Autorizacion de Vacunacion</label></br>
			<label><input type="radio"  name="autorizavacuna" id="opc3" value="1" checked> SI</label>
		</div>

		<div class="form-group">
			
			<label><input type="radio"  name="autorizavacu" id="opc3" value="0"> NO</label>
		</div>

		<div class="form-group">
		<label>Reside en Area Urbana</label></br>
			<label><input type="radio"  name="zonahabitacion" id="opc4" value="1" checked> SI</label>
		</div>

		<div class="form-group">
			<label><input type="radio"  name="zonahabitacio" id="opc4" value="0"> NO</label>
		</div>

		<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Datos de la Madre de Familia</a></h3>
		
	</div>
</div>
<div class="form-group">
			<label>Nombres de la Madre</label>
			<input type="text" value="111" class="form-control" name="nombre2" placeholder="Nombres Completos">
		</div>

		<div class="form-group">
			<label>Apellidos de la Madre</label>
			<input type="text" value="111" class="form-control" name="apellido2" placeholder="Apellidos Completos">
		</div>
		<div class="form-group">
			<label>Tipo responsable</label>
			<input type="numeric" value="1" class="form-control" name="idresponsable1" placeholder="Apellidos Completos">
		</div>
		<div class="form-group">
			<label>DUI de la Madre</label>
			<input type="numeric" value="111" class="form-control" name="dui" placeholder="DUI sin guiones">
		</div>
		<div class="form-group">
			<label>Ocupacion de la Madre</label>
			<input type="text" value="111" class="form-control" name="ocupacion" placeholder="Ocupacion que ejerce la Madre">
		</div>
		<div class="form-group">
			<label>Lugar de trabajo</label>
			<input type="text" value="111" class="form-control" name="lugardetrabajo" placeholder="Nombre de la empresa o sitio donde actualmente trabaja">
		</div>
		<div class="form-group">
			<label>Telefono de contacto de la Madre</label>
			<input type="numeric" value="111" class="form-control" name="telefono" placeholder="Telefono principal de contacto">
		</div>



	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<div class="form-group">
			<label>Partida de nacimiento</label>
			<label>Folio</label>
			<input type="numeric" value="111" class="form-control" name="folio" placeholder="Folio...">
		</div>
		<div class="form-group">
			<label>Libro</label>
			<input type="numeric" value="111" class="form-control" name="libro" placeholder="Libro...">
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Grado</label>
				<select name="idgrado" class="form-control">
					@foreach ($grados as $gr)
					<option value="{{$gr->idgrado}}">{{$gr->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Turno</label>
				<select name="idturno" class="form-control">
					@foreach ($turnos as $tu)
					<option value="{{$tu->idturno}}">{{$tu->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Seccion</label>
				<select name="idseccion" class="form-control">
					@foreach ($secciones as $ss)
					<option value="{{$ss->idseccion}}">{{$ss->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>

        <div class="form-group">
			<label>Presenta Partida</label></br>
			<label><input type="radio"  name="presentapartida" id="opc2" value="0" checked> NO</label>
		</div>

		<div class="form-group">
			<label>Certificado de promocion de ultimo año cursado</label></br>
			<label><input type="radio"  name="certificadoprom" id="opc2" value="0" checked> NO</label>
		</div>

		<div class="form-group">
			<label>Presenta Fotos</label></br>
			<label><input type="radio"  name="presentafotos" id="opc2" value="0" checked> NO</label>
		</div>

		<div class="form-group">
			<label>Constancia de Conducta</label></br>
			<label><input type="radio"  name="constanciaconducta" id="opc2" value="0" checked> NO</label>
		</div>

		<div class="form-group">
			<label>Educacion inicial</label></br>
			<label><input type="radio"  name="educacioninicial" id="opc2" value="0" checked> NO</label>
		</div>

		<div class="form-group">
			<label>Repite Grado</label></br>
			<label><input type="radio"  name="repitegrado" id="opc2" value="0" checked> NO</label>
		</div>

		<div class="form-group">
			<label>Fecha de matricula</label>
			<input type="date" class="form-control" name="fechamatricula" placeholder="AAAA-MM-DD">
		</div>

		<div class="form-group">
			<label>Centro escolar del que procede</label>
			<input type="text" value="111" class="form-control" name="cePrevio" placeholder="AAAA-MM-DD">
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="imagen">Imagen</label>
            	<input type="file" name="fotografia" class="form-control">
            </div>
		</div>





		<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
		{!!Form::close()!!}
	</div>
</div>

@endsection