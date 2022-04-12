<!-- general form elements -->
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Crear Cliente</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form action="" method="post" id="formdata">
              <div class="row">
                <div class="col-md-4">
                    <label for="nit">Nit</label>
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" class="form-control"  value="<?php echo $alm->infra ?>" placeholder="" > 
                        <input type="hidden" name="creacion" id="creacion" class="form-control"  value="<?php echo $alm->creacion ?>" placeholder="" >
                        <input type="hidden" name="actualizacion" id="actualizacion" class="form-control"  value="<?php echo date('Y-m-d'); ?>" placeholder="" >
                        <input type="text" name="nit" id="nit" class="form-control"  value="<?php echo $alm->nit ?>" placeholder="" >
                    </div>
                    <!-- /form-group -->
                </div>
                <div class="col-md-4">
                    <label for="nit">Nombre</label>
                    <div class="form-group">
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder=""  value="<?php echo $alm->infra_nom ?>">
                    </div>
                    <!-- /form-group -->
                </div>
                <div class="col-md-4">
                    <label for="nit">Dirección</label>
                    <div class="form-group">
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder=""  value="<?php echo $alm->direccion ?>">
                    </div>
                    <!-- /form-group -->
                </div>
              </div> 
              <div class="row">
                <div class="col-md-4">
                    <label for="nit">Telefono</label>
                    <div class="form-group">
                        <input type="text" id="tel" name="telefono" class="form-control" placeholder=""  value="<?php echo $alm->telefono ?>">
                    </div>
                    <!-- /form-group -->
                </div><div class="col-md-4">
                    <label for="nit">Barrio</label>
                    <div class="form-group">
                        <input type="text" id="barrio" name="barrio" class="form-control" placeholder="" id="barrio" value="<?php echo $alm->barrio ?>">
                    </div>
                    <!-- /form-group -->
                </div>
                <div class="col-md-4">
                    <label for="nit">Ciudad</label>
                    <div class="form-group">
                        <input type="text" id="ciudad" name ="ciudad" class="form-control" placeholder=""  id="ciudad" value="<?php echo $alm->ciudad ?>">
                    </div>
                    <!-- /form-group -->
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <label for="nit">Administrador</label>
                    <div class="form-group">
                        <input type="text" id="admin" name="admin" class="form-control" placeholder="" id="admin" value="<?php echo $alm->administrador ?>">
                    </div>
                    <!-- /form-group -->
                </div>
                <div class="col-md-4">
                    <label for="nit">No de Inmuebles
                    </label>
                    <div class="form-group">
                        <input type="text" id="num_inmue" name="num_inmue" class="form-control" placeholder=""  value="<?php echo $alm->num_inmueble?>">
                    </div>
                    <!-- /form-group -->
                </div>
                <div class="col-md-4">
                    <label for="nit">Tipo de Inmueble</label>
                    <div class="form-group">
                      <?php  $tiposinfra = $this->model->Listar_infra()?> 
                             <select name="tipo_infraestrura" id="tipo" class="form-control">
                                 <?php foreach( $tiposinfra as $tiposinfras): ?>
                                 <option value="<?php echo $tiposinfras->id   ?>"> <?php echo $tiposinfras->nombre ?></option>
                                 <?php endforeach; ?>
                             </select>
                    </div>
                    <!-- /form-group -->
                </div>
                </div>
                </div>
            </div>       
              <div class="col-md-12">
              <input type="button" id="botonenviar" class="btn btn-default btn-block" value="Enviar">     
              
                    <!-- /form-group -->
                </div>       
              </div>
              </form>
              <div id="exito" style="display:none">
            Sus datos han sido recibidos con éxito.
        </div>
        <div id="fracaso" style="display:none">
            Se ha producido un error durante el envío de datos.
        </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
<script>   
    $(document).on('click','#botonenviar',function(e) {
    var data = $("#formdata").serialize();
    $.ajax({
         data: data,
         type: "post",
         url: "?c=condominios&a=add",
         success: function(data){
              alert('EL REGISTRO SE CREO CON EXITO');
             window.location = '?c=condominios&a=dashboard';
         }
	});
});
</script>