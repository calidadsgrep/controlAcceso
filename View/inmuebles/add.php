<!-- general form elements -->
<?php //print_r($alm) //$habitantes=$this->model->Habitantes(); print_r($habitantes) ?>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">INMUEBLE</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form action="" method="post" id="formdata">
              <div class="row">
                <div class="col-md-8">
                    <label for="nit">Propietario</label>
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" class="form-control"  value="<?php echo $alm->inmuebles_id ?>" placeholder="" > 
                        <input type="hidden" name="creacion" id="creacion" class="form-control"  value="<?php echo $alm->creacion ?>" placeholder="" >
                        <input type="hidden" name="actualizacion" id="actualizacion" class="form-control"  value="<?php echo date('Y-m-d'); ?>" placeholder="" >
                       <?php
                        (isset($_REQUEST['infra_id'])) ? $infra=$_REQUEST['infra_id'] :  $infra=$alm->infra_id ;
                       ?>
                        <input type="hidden" id="infra_id" name="infra_id" class="form-control" placeholder=""  value="<?php echo $infra ?>">
                       
                        <select name="usuario_id" id="usuario_id" class="form-control select2bs4" style="width: 100%;">
                           <option value="" >Seleccionar</option>
                           <?php $habitantes=$this->model->Habitantes(); ?>
                           <?php  foreach ($habitantes as $habitante):?>
                            <option <?php echo $habitante->id == $alm->usuario_id ? 'selected' : ''; ?> value="<?php echo $alm->usuario_id ?>"><?php  echo  $habitante->nombre?></option>
                           <?php  endforeach; ?>
                        </select>                       
                    </div>
                    <!-- /form-group -->
                </div>
                <div class="col-md-4">
                    <label for="nit">Telefono</label>
                    <div class="form-group">
                        <input type="number" id="telefono" name="telefono" class="form-control" placeholder=""  value="<?php echo $alm->telefono ?>" >
                    </div>
                    <!-- /form-group -->
                </div>
              </div> 
              
              <div class="row">
              <div class="col-md-5">
                    <label for="nit">Confirmar Correo de Notificación</label>
                    <div class="form-group">
                        <input type="mail" id="correo" name="correo" class="form-control" placeholder=""  value="<?php echo $alm->correo ?>">
                    </div>
                    <!-- /form-group -->
                </div>
                
                <div class="col-md-3">
                    <label for="nit">Identificación interna</label>
                    <div class="form-group">
                        <input type="text" id="numero" name="numero" class="form-control" placeholder=""  value="<?php echo $alm->numero ?>">
                    </div>
                    <!-- /form-group -->
                </div>
                <div class="col-md-4">
                    <label for="">Tipo de Inmueble</label>
                    <div class="form-group">
                      <?php  $tiposinfra = $this->model->Listar_infra()?> 
                             <select name="tipo_inmueble" id="tipo_inmueble" class="form-control">
                                 <?php foreach( $tiposinfra as $tiposinfras): ?>
                                    <option <?php echo $tiposinfras->id == $alm->infra_id ? 'selected' : ''; ?> value="<?php echo $alm->infra_id ?>"><?php  echo  $tiposinfras->tipo?></option>
                                 <?php endforeach; ?>
                             </select>
                    </div>
              </div>
              <div class="col-md-4">
                    <label for="">¿Mascotas?</label>
                    <div class="form-group">
                        <select name="mascota" id="mascota" class="form-control" onchange="mascotas(this)">
                                <option value="no"> No</option> 
                                <option value="si"> Si</option>                              
                        </select>
                    </div>
              </div>
              <div class="col-md-4" id="masc" style="display:none">
                    <label for="">Tipo Mascota</label>
                    <div class="form-group">
                        <input name="tipomasc" type="text" class="form-control" value="<?php echo $alm->tipomasc ?>">                        
                    </div>                
                </div>
              <div class="col-md-4" id="masc1" style="display:none">
                    <label for="">Cantidad</label>
                    <div class="form-group">                        
                        <input name="cantidadmasc" type="number" class="form-control" value="<?php echo $alm->cantidadmasc ?>">
                    </div>
              </div>       
              <div class="col-md-12">
              <input type="button" id="botonenviar" class="btn btn-default btn-block" value="Enviar">     
              
                    <!-- /form-group -->
                </div>       
              </div>
                                 </form>              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
<script>   
    $(document).on('click','#botonenviar',function(e) {
    var data = $("#formdata").serialize();
    $.ajax({
         data: data,
         type: "post",
         url: "?c=inmuebles&a=crud",

         success: function(resp) {
            // debugger;
            $('#index').html(resp);
            $('#respuesta').html("<div class='alert alert-success'></div>");
        }
	});
});

$(function () {
//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
});
});

function mascotas(sel){

    if (sel.value=="si"){
           divC = document.getElementById("masc");
           divC1 = document.getElementById("masc1");
           divC.style.display = ""; 
           divC1.style.display = "";         
     }else{
        divC = document.getElementById("masc");
        divC.style.display = "none";
        divC1 = document.getElementById("masc1");
        divC1.style.display = "none";
     }

}


</script>