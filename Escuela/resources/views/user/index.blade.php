@extends ('layouts.admin')
@section('contenido')



<div class="table-responsive">
       @if($data)

       <table id="tabla_pacientes" class="display table table-hover" cellspacing="0" width="100%">
       
        <thead>
            <tr>
             
                <th>Nombre</th>
                <th>email</th>
                <th>tipo</th>
                <th>Fecha de Registro</th>
             
              <th>Acción</th>
            </tr>
        </thead>
 
        
       
<tbody>
    @foreach($data as $row)
    <tr>
       <td>{{ $row->name}}</td>
       <td>{{ $row->email}}</td>
       <td>{{ $row->tipoUsuario}}</td>
       <td>{{ $row->created_at}}</td>
       <td>
           
       </td>
</tbody>
@endforeach

 </table>
 @endif

</div>




@endsection

