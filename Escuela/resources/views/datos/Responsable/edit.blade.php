@extends('layouts.admin')
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


<fieldset class="well the-fieldset">
 <div class="col-md-12 col-md-offset-0">
   
    @if($responsable->idresponsable==2)
    {!!Form::model($responsable,['method'=>'PATCH','route'=>['datos.Responsable.update',$responsable->id_persona]])!!}
{{Form::token()}}
<fieldset class="well the-fieldset">
		<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos del Padre</h2></legend>
			<div class="form-group col-md-3">
				<label>Nombres del Padre</label>
				<input type="text" value={{$responsable->nombre}} class="form-control" autofocus name="nombre" placeholder="Nombres Completos">
			</div>
			<div class="form-group col-md-3">
				<label>Apellidos del Padre</label>
				<input type="text" value={{$responsable->apellido}} class="form-control" autofocus name="apellido" placeholder="Apellidos Completos">
			</div>
			<div class="form-group col-md-3">
				<label>DUI del Padre</label>
				<input type="text" value={{$responsable->dui}} class="form-control" autofocusautofocus  name="dui" placeholder="DUI sin guiones">
			</div>
		</div>

		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Ocupacion del Padre</label>
					<input type="text" value={{$responsable->ocupacion}} class="form-control" autofocus name="ocupacion" placeholder="Ocupacion que ejerce la Madre">
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Lugar de trabajo</label>
					<input type="text" value={{$responsable->lugardetrabajo}} class="form-control" autofocus name="lugardetrabajo" placeholder="Nombre de la empresa o sitio donde actualmente trabaja">
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Telefono de contacto del Padre</label>
					<input type="text" value={{$responsable->telefono}} class="form-control" autofocus name="telefono" placeholder="Telefono principal de contacto">
				</div>
			</div>
		</div>

<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

{!!Form::close()!!}
    @else
      {!!Form::model($responsable,['method'=>'PATCH','route'=>['datos.Responsable.update',$responsable->id_persona]])!!}
{{Form::token()}}
        		<legend class="the-legend"><h2>Datos de la Madre</h2></legend>
			<div class="form-group col-md-3">
				<label>Nombres de la Madre</label>
				<input type="text" value={{$responsable->nombre}} class="form-control" autofocus name="nombre" placeholder="Nombres Completos" >
			</div>
			<div class="form-group col-md-3">
				<label>Apellidos de la Madre</label>
				<input type="text" value={{$responsable->apellido}} class="form-control" autofocus name="apellido" placeholder="Apellidos Completos" >
			</div>
			<div class="form-group col-md-3">
				<label>DUI de la Madre</label>
				<input type="text" value={{$responsable->dui}} class="form-control" autofocus name="dui" placeholder="DUI sin guiones">
			</div>
		</div>

		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Ocupacion de la Madre</label>
					<input type="text" value={{$responsable->ocupacion}} class="form-control" autofocus name="ocupacion" placeholder="Ocupacion que ejerce la Madre">
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Lugar de trabajo</label>
					<input type="text" value={{$responsable->lugardetrabajo}} class="form-control" autofocus name="lugardetrabajo" placeholder="Nombre de la empresa o sitio donde actualmente trabaja">
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Telefono de contacto  Madre</label>
					<input type="text" value={{$responsable->telefono}} class="form-control" autofocus name="telefono" placeholder="Telefono principal de contacto" >
				</div>
			</div>
		</div>

        <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

{!!Form::close()!!}
        
    @endif



 

</fieldset>
</div>
</div>
@endsection