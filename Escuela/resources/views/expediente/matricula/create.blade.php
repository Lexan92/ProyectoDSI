@extends ('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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



{!!Form::open(array('url'=>'expediente/matricula','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

<fieldset class="well the-fieldset">
<div class="col-md-12 col-md-offset-0">
	<legend class="the-legend"><h1 style="text-align: center;">FORMULARIO DE MATRICULA</h1></legend>
</div>
	<div class="row">

		<div class="col-md-12">
			<div class="form-group col-md-3">
				<label for="">Fecha de Matricula</label>
				<input type="date" class="form-control" name="fechamatricula" autofocus placeholder="AAAA-MM-DD" required="">
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
				<label>Grado</label>
				<select name="idgrado" class="form-control">
					@foreach ($grados as $gr)
					<option  value="{{$gr->idgrado}}">{{$gr->nombre}}</option>
					@endforeach
				</select>
				</div>
			</div>
			<div class="form-group col-md-3">
					<div class="form-group">
					<label>Seccion</label>
					<select name="idseccion" class="form-control">
						@foreach ($secciones as $ss)
						<option value="{{$ss->idseccion}}">{{$ss->nombre}}</option>
						@endforeach
					</select>
					</div>
			</div>
			<div class="form-group col-md-3">
					<div class="form-group">
					<label>Turno</label>
					<select name="idturno" class="form-control">
						@foreach ($turnos as $tu)
						<option value="{{$tu->idturno}}">{{$tu->nombre}}</option>
						@endforeach
					</select>
					</div>
			</div>
			

		</div>
		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-2">
				<label>Presenta Partida</label></br>
				<label><input type="checkbox"  name="presentapartida" id="opc2" value="0" checked="checked"> SI</label>
			</div>
			<div class="form-group col-md-2">
				<label>Presenta Certificado</label></br>
				<label><input type="checkbox"  name="certificadoprom" id="opc2" value="0" checked="checked">  SI</label>
			</div>
			<div class="form-group col-md-2">
				<label>Presenta Fotos</label></br>
				<label><input type="checkbox"  name="presentafotos" id="opc2" value="0" checked="checked"> SI</label>
			</div>
			<div class="form-group col-md-2">
				<label>Constancia/Conducta</label></br>
			<label><input type="checkbox"  name="constanciaconducta" id="opc2" value="0" checked="checked"> SI</label>
			</div>
			<div class="form-group col-md-2">
				<label>Educacion inicial</label></br>
				<label><input type="checkbox"  name="educacioninicial" id="opc2" value="0" checked="checked"> SI</label>
			</div>
			<div class="form-group col-md-2">
				<label>Repite Grado</label></br>
				<label><input type="checkbox"  name="repitegrado" id="opc2" value="0" checked="checked"> SI</label>
			</div>
		</div>
		</fieldset>
		<fieldset class="well the-fieldset">
	

		<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos Generales del Estudiante</h2></legend>
			<div class="form-group col-md-3">
				<label for="">NIE</label>
				<input type="number" value="111" class="form-control" autocomplete="on" name="nie" placeholder="NIE" autofocus required>
			</div>
			<div class="form-group col-md-3">
				<label>N°. Folio partida de nacimiento</label>
				<input type="number" value="111" class="form-control" name="folio" autofocus placeholder="Folio..." required="">
			</div>
			<div class="form-group col-md-3">
				<label>N°. Libro partida de nacimiento</label>
				<input type="number" value="111" class="form-control" name="libro" autofocus placeholder="Libro..." required="">
			</div>
		</div>

		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-3">
				<label for="">Nombres</label>
				<input type="text" value="111" class="form-control" name="nombre" autofocus placeholder="Nombres Completos"required>
			</div>
			<div class="form-group col-md-3">
				<label for="">Apellidos</label>
				<input type="text" value="111" class="form-control" name="apellido" autofocus placeholder="Apellidos Completos"  required="">
			</div>
			<div class="form-group col-md-3">
				<label for="">Fecha de Nacimiento</label>
				<input type="date" class="form-control" name="fechadenacimiento" autofocus placeholder="AAAA-MM-DD" required="">
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
	            	<label for="imagen">Fotografia</label>
	            	<input type="file" name="fotografia" autofocus class="form-control">
            	</div>  
			</div>
		</div>

		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-4">
				<label for="">Domicilio</label>
				<input type="textarea" value="111" class="form-control" autofocus name="domicilio" rows="10" cols="50" placeholder="Direccion Actual del estudiante" >
			</div>
			<div class="form-group col-md-4">
				<label for="">Padece de alguna enfermedad</label>
				<input type="text" value="111" class="form-control" autofocus name="enfermedad" placeholder="Introduzca el nombre de la enfermedad">
			</div>
			<div class="form-group col-md-4">
				<label>Centro escolar del que procede</label>
			<input type="text" value="111" class="form-control" autofocus name="cePrevio" placeholder="Digite el centro escolar de donde procede">
			</div>
		</div>



		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-3">
				<label>Sexo</label></br>
				<label><input type="radio"  name="sexo" id="opc1" value="F" checked="checked"> Femenino</label>
				<label><input type="radio"  name="sex" id="opc1" value="M"> Masculino</label>
			</div>
			<div class="form-group col-md-3">
				<label>¿Tiene discapacidad?</label></br>
				<label><input type="radio"  name="discapacidad" id="opc2" value="0" checked="checked"> NO</label>
				<label><input type="radio"  name="discapacida" id="opc2" value="1"> SI</label>
			</div>
			<div class="form-group col-md-3">
				<label>Autorizacion de Vacunacion</label></br>
				<label><input type="radio"  name="autorizavacuna" id="opc3" value="0" checked="checked"> SI</label>
				<label><input type="radio"  name="autorizavacu" id="opc3" value="1"> NO</label>
			</div>
			<div class="form-group col-md-3">
				<label>Area en la que reside</label></br>
				<label><input type="radio"  name="zonahabitacion" id="opc4" value="0" checked="checked"> Urbana</label>	
				<label><input type="radio"  name="zonahabitacio" id="opc4" value="1"> Rural</label>
			</div>
		</div>
</fieldset>

<fieldset class="well the-fieldset">
	

		<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos de la Madre</h2></legend>
			<div class="form-group col-md-3">
				<label>Nombres de la Madre</label>
				<input type="text" value="111" class="form-control" autofocus name="nombre2" placeholder="Nombres Completos" >
			</div>
			<div class="form-group col-md-3">
				<label>Apellidos de la Madre</label>
				<input type="text" value="111" class="form-control" autofocus name="apellido2" placeholder="Apellidos Completos" >
			</div>
			<div class="form-group col-md-3">
				<label>DUI de la Madre</label>
				<input type="number" value="111" class="form-control" autofocus name="dui" placeholder="DUI sin guiones">
			</div>
		</div>

		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Ocupacion de la Madre</label>
					<input type="text" value="111" class="form-control" autofocus name="ocupacion" placeholder="Ocupacion que ejerce la Madre">
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Lugar de trabajo</label>
					<input type="text" value="111" class="form-control" autofocus name="lugardetrabajo" placeholder="Nombre de la empresa o sitio donde actualmente trabaja">
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Telefono de contacto  Madre</label>
					<input type="number" value="111" class="form-control" autofocus name="telefono" placeholder="Telefono principal de contacto" >
				</div>
			</div>
		</div>
</fieldset>

<fieldset class="well the-fieldset">
	

		<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos del Padre</h2></legend>
			<div class="form-group col-md-3">
				<label>Nombres del Padre</label>
				<input type="text" value="111" class="form-control" autofocus name="nombre3" placeholder="Nombres Completos">
			</div>
			<div class="form-group col-md-3">
				<label>Apellidos del Padre</label>
				<input type="text" value="111" class="form-control" autofocus name="apellido3" placeholder="Apellidos Completos">
			</div>
			<div class="form-group col-md-3">
				<label>DUI del Padre</label>
				<input type="number" value="111" class="form-control" autofocusautofocus  name="dui3" placeholder="DUI sin guiones">
			</div>
		</div>

		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Ocupacion del Padre</label>
					<input type="text" value="111" class="form-control" autofocus name="ocupacion3" placeholder="Ocupacion que ejerce la Madre">
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Lugar de trabajo</label>
					<input type="text" value="111" class="form-control" autofocus name="lugardetrabajo3" placeholder="Nombre de la empresa o sitio donde actualmente trabaja">
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Telefono de contacto del Padre</label>
					<input type="number" value="111" class="form-control" autofocus name="telefono3" placeholder="Telefono principal de contacto">
				</div>
			</div>
		</div>
</fieldset>

<fieldset class="well the-fieldset">
	

		<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos del Contacto de Emergencia</h2></legend>
			<div class="form-group col-md-3">
				<label>Nombres del Contacto Emergencia</label>
				<input type="text" value="111" class="form-control" autofocus name="nombre4" placeholder="Nombres Completos" required="">
			</div>
			<div class="form-group col-md-3">
				<label>Apellidos del Contacto de Emergencia</label>
				<input type="text" value="111" class="form-control" autofocus name="apellido4" placeholder="Apellidos Completos" required="">
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Telefono de Contacto de Emergencia</label>
					<input type="number" value="111" class="form-control" autofocus  name="telefono4" placeholder="Telefono principal de contacto">
				</div>
			</div>	
		</div>
</fieldset>

<fieldset class="well the-fieldset">
<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h3>Tiene familiares estudiando dentro de la institución</h3></legend>
		<div class="panel panel-primary">
		<div class="panel-body">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label for="matricula">Estudiante</label>
					<select name="pid_matricula" class="form-control selectpicker" id="pid_matricula" data-Live-search="true">
						@foreach($matriculas as $matricula)
						<option value="{{ $matricula->id_matricula }}">{{$matricula->nie}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
				<div class="form-group">
					<label for="parentesco">Parentesco</label>
					<input type="text" name="pparentesco" id="pparentesco" class="form-control" placeholder="Parentesco">
				</div>
			</div>
			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
				<div class="form-group">
					<br>
					<button type="button" id="bt_add" class="btn btn-primary" >Agregar</button>
				</div>
			</div>
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
					<thead style="background-color: #A9D0F5">
						<th>Opciones</th>
						<th>Estudiante</th>
						<th>Parentesco</th>
					</thead>
					<tfoot>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tfoot>
					<tbody>
						
					</tbody>
				</table>
			</div>			
		</div>
	</div>
</div>
</fieldset>
</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
			<div class="form-group">
			<input name="_token" value="{{csrf_token()}}" type="hidden"></input>
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
		</div>
		
{!!Form::close()!!}

@push('scripts')
<script>

	$(document).ready(function(){
		$('#bt_add').click(function(){
			agregar();
		});
	});

	var cont = 0;
	//$('#guardar').hide(); //Botón guardar inicialmente oculto

	function agregar(){
		id_matricula =$('#pid_matricula').val();
		matricula=$("#pid_matricula option:selected").text();
		parentesco =$('#pparentesco').val();

		if(id_matricula!=" " && parentesco!=""){

			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="id_matricula[]" value="'+id_matricula+'">'+matricula+'</td><td><input type="text" name="parentesco[]" value="'+parentesco+'"></td></tr>';
			cont++;
			limpiar();
			$('#detalles').append(fila);
		}
		else{
			alert("Error al ingresar parentesco");
		}
	}

	
	function limpiar(){
		$("#pparentesco").val("");
	}

	function eliminar(index){
		$("#fila"+index).remove();
		evaluar();
	}


</script>
@endpush

@endsection