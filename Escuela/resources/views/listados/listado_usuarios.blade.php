
@extends ('layouts.admin')
@section('contenido')



<div class="box-header">
 <h4 class="box-title">Buscar Usuarios</h4>
        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="dato_buscado">
                            <span class="input-group-btn">
                              <button class="btn btn-info btn-flat" type="button" onclick="buscarusuario();" >Buscar</button>
                            </span>
        </div>
      
        

                 
</div>

<div class="box-body">              
<?php 

if( count($usuarios) >0){
?>

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


<?php 

   foreach($usuarios as $usuario){  
?>




 <tr role="row" class="odd">
   
    <td class="mailbox-messages mailbox-name" ><a   style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $usuario->name ?></a></td>
    <td><?= $usuario->email;  ?></td>
    <td><span class="label label-primary "><?= $usuario->tipo($usuario->tipoUsuario);   ?></span></td>
    <td><?= $usuario->created_at;  ?></td>
     <td><a  href="form_editar_usuario/{{$usuario->id}}" class="btn btn-primary">Editar</a>&nbsp;<a type="submit" action="eliminar" class="btn btn-primary label-danger">Eliminar</a></td>

    
</tr>

<?php        
}
?>


  

    </table>



    <?php


echo str_replace('/?', '?', $usuarios->render() )  ;

}
else
{

?>


<br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div> 

<?php
}

?>
</div>



@endsection

