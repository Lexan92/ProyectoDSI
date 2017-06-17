@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Responsables </h3>
	
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Parentesco</th>
					<th>Telefono</th>
				</thead>
               @foreach ($responsables as $re)
				<tr>
					<td>{{ $re->nombre}}</td>
					<td>{{ $re->apellido}}</td>
					<td>{{ $re->nombretipo}}</td>
					<td>{{ $re->telefono}}</td>
					<td>
						<a href="{{URL::action('ResponsableController@edit',$re->id_persona)}}"><button class="btn btn-info">Editar</button></a>
                         
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		
	</div>
</div>

    
@endsection