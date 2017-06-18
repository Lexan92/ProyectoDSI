@extends ('layouts.admin')
@section('contenido')







<fieldset class="well the-fieldset">

<div class="col-md-12 col-md-offset-0">



                
<div class="col-md-12 col-md-offset-0">
  <legend class="the-legend"><h1 style="text-align: center;">Registro de Usuario</h1></legend>
</div>





<form   method="post"  action="/users.store" class="form-horizontal form_entrada" >                
    
<input type="hidden" name="_token" value="{{ csrf_token() }}">            
  

<div class="box-body col-xs-12">
<div class="form-group col-xs-6">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name"  placeholder="Nombre" >
</div>

<div class="form-group col-xs-4">
                      <label for="tipoUsuario">Tipo Usuario</label>
                      <select id="tipoUsuario" name="tipoUsuario" class="form-control" >
                      <?php  for($i=0;$i<=count($tiposusuario)-1;$i++){   ?>
                      <option value="<?= $tiposusuario[$i]->id  ?>" ><?= $tiposusuario[$i]->nombre ?></option>
                      <?php  } ?>
                      </select>
                   
</div>

<div class="form-group col-xs-6">
                      <label for="email">Email*</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="email" >
</div>

<div class="form-group col-xs-6">
                      <label for="email">password*</label>
                      <input type="password" class="form-control" id="password" name="password" p required >
</div>

</div>




<div class="box-footer col-xs-0 ">
                    <button type="submit" class="btn btn-primary">Guardar</button>
</div>


</form>



</div>
</fieldset>

@endsection

