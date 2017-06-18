@extends ('layouts.admin')
@section('contenido')

<div class="row">  

  <div class="col-md-6">

        <div class="box box-primary">
                        
                        <div class="box-header">
                          <h3 class="box-title">Editar información del Usuario</h3>
                        </div><!-- /.box-header -->

        <div id="notificacion_resul_feu"></div>



        <form  id="f_editar_usuario"  method="post"  action="editar_usuario" class="form-horizontal form_entrada" >                
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
          <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">              


        <div class="box-body ">
        <div class="form-group col-xs-6">
                      <label for="name">Nombre*</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?= $usuario->name; ?>" placeholder="Nombres" >
        </div>
        
       <!-- <div class="form-group col-xs-12">
                              <label for="ocupacion">Ocupacion</label>
                              <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="<?= $usuario->ocupacion; ?>" >
        </div>-->
     
<div class="form-group col-xs-4">
                      <label for="tipoUsuario">Tipo Usuario</label>
                      <select id="tipoUsuario" name="tipoUsuario" class="form-control" >
                      <?php  for($i=0;$i<=count($tiposusuario)-1;$i++){   ?>
                      <option value="<?= $tiposusuario[$i]->id  ?>" ><?= $tiposusuario[$i]->nombre ?></option>
                      <?php  } ?>
                      </select>
                   
</div>


        </div>



        <div class="box-footer">
             <button type="submit" class="btn btn-primary">Actualizar Datos</button>
        </div>
        </form>
        </div>

  </div> <!-- end col mod 6 -->


    <div class="col-md-6">

<div class="box box-primary">

                <div class="box-header with-border">
                  <h3 class="box-title">Cambiar Password</h3>
                </div><!-- /.box-header -->




                <div id="notificacion_resul_fcp"></div>
                <!-- form start -->
                <form method="post" id="f_cambiar_password" class="form_entrada" action="cambiar_password" >
                     <input type="hidden" name="id_usuario_password" value="<?= $usuario->id; ?>"> 
                   <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email </label>
                      <input type="email" class="form-control" id="email_usuario" name="email_usuario" placeholder="Entrar email" value="<?= $usuario->email; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder="Password" required>
                    </div>
                  
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Cambiar Datos</button>
                  </div>
                </form>
              </div>

  </div>    <!-- end col mod 6 -->

</div>  <!--end row -->


@endsection