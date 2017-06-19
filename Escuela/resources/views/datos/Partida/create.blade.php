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
	</div>
</div>

{!!Form::open(array('url'=>'datos/Partida','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
{{Form::token()}}

<fieldset class="well the-fieldset">
<div class="col-md-12 col-md-offset-0">
<legend class="the-legend"><h1 style="text=align: center;">Datos de Partida de Nacimiento</h1></legend>
</div>

<div class="row">
<div class="col-md-12">
<label>Folio</label>
<input type="text" class="form-control" name="folio" placeholder="Escriba el numero de folio de la partida de nacimiento"> 
</div>

<div class="col-md-12">
<label>Libro</label>
<input type="text" class="form-control" name="libro" placeholder="Escriba el numero de libro de la partida de nacimiento"> 
</div>


<div class="col-md-12">
<label>Imagen</label>
<input type="file" class="form-control" name="imagen" placeholder="Escriba el numero de libro de la partida de nacimiento"> 
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
			<div class="form-group">
			<input name="_token" value="{{csrf_token()}}" type="hidden"></input>
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
		</div>

</div>
</fieldset>
{!!Form::close()!!}


@endsection