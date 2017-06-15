@extends ('layouts.admin')
@section ('contenido')
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

			{!!Form::model($estudiante,['method'=>'PATCH','route'=>['datos.Estudiante.update',$estudiante->nie]])!!}
            {{Form::token()}}


<fieldset class="well the-fieldset">
<p><input type="text" value={{$estudiante->id_partida}} hidden></p>


		<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos Generales del Estudiante</h2></legend>
			<div class="form-group col-md-3">
				<label for="">NIE</label>
				<input type="number" value={{$estudiante->nie}} class="form-control" autocomplete="on" name="nie" placeholder="NIE" autofocus required>
			</div>
			

		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-3">
				<label for="">Nombres</label>
				<input type="text" value={{$estudiante->nombre}} class="form-control" name="nombre" autofocus placeholder="Nombres Completos">
			</div>
			<div class="form-group col-md-3">
				<label for="">Apellidos</label>
				<input type="text" value={{$estudiante->apellido}} class="form-control" name="apellido" autofocus placeholder="Apellidos Completos"  required="">
			</div>
			<div class="form-group col-md-3">
				<label for="">Fecha de Nacimiento</label>
				<input type="date" class="form-control" value={{$estudiante->fechadenacimiento}} name="fechadenacimiento" autofocus placeholder="AAAA-MM-DD" required="">
			</div>
		

		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-4">
				<label for="">Domicilio</label>
				<input type="textarea" value={{$estudiante->domicilio}} class="form-control" autofocus name="domicilio" rows="10" cols="50" placeholder="Direccion Actual del estudiante" >
			</div>
			<div class="form-group col-md-4">
				<label for="">Padece de alguna enfermedad</label>
				<input type="text" value={{$estudiante->enfermedad}} class="form-control" autofocus name="enfermedad" placeholder="Introduzca el nombre de la enfermedad">
			</div>
		



		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-3">
				<label>Sexo</label></br>
				@if($estudiante->sexo=="F")
					<label><input type="radio"  name="sexo" id="opc1" value="F" checked="checked"> Femenino</label>
				<label><input type="radio"  name="sexo" id="opc1" value="M"> Masculino</label>
				@else
					<label><input type="radio"  name="sexo" id="opc1" value="F" > Femenino</label>
				<label><input type="radio"  name="sexo" id="opc1" value="M" checked="checked"> Masculino</label>
				@endif
				
			</div>
			<div class="form-group col-md-3">
				<label>¿Tiene discapacidad?</label></br>
				@if($estudiante->discapacidad==true)
					<label><input type="radio"  name="discapacidad" id="opc2" value="0" > NO</label>
				<label><input type="radio"  name="discapacidad" id="opc2" value="1" checked="checked"> SI</label>
				@else
				<label><input type="radio"  name="discapacidad" id="opc2" value="0" checked="checked" > NO</label>
				<label><input type="radio"  name="discapacidad" id="opc2" value="1" > SI</label>
				@endif
				
			</div>
			<div class="form-group col-md-3">
				<label>Autorizacion de Vacunacion</label></br>
				@if($estudiante->autorizavacuna==true)
				<label><input type="radio"  name="autorizavacuna" id="opc3" value="1" checked="checked"> SI</label>
				<label><input type="radio"  name="autorizavacuna" id="opc3" value="0"> NO</label>
				@else
				<label><input type="radio"  name="autorizavacuna" id="opc3" value="1" > SI</label>
				<label><input type="radio"  name="autorizavacuna" id="opc3" value="0" checked="checked"> NO</label>	
				@endif
		
			</div>
			<div class="form-group col-md-3">
				<label>Area en la que reside</label></br>
				@if($estudiante->zonaurbana==true)

				<label><input type="radio"  name="zonaurbana" id="opc4" value="1" checked="checked"> Urbana</label>
				<label><input type="radio"  name="zonaurbana" id="opc4" value="0"> Rural</label>

				@else
					<label><input type="radio"  name="zonaurbana" id="opc4" value="1" > Urbana</label>
				<label><input type="radio"  name="zonaurbana" id="opc4" value="0" checked="checked"> Rural</label>
				@endif
				
			</div>
		</div>
</fieldset


 <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>


			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection