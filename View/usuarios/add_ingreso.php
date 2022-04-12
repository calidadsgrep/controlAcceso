<style> @media only screen and (max-width: 700px){video {max-width: 100%;}}</style>
<?php //$infras=$this->model->Tipo_usuarios();?>
<?php //print_r($infras);?> 
<!-- Basic Card -->
<div class="row clearfix text-center">
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card">
      <div class="header"><h4<small></small></h4></div>
      <div class="body">
        <div class="row clearfix">
            <div class="col-md-12 text-center">
                    <label>Selecciona un dispositivo</label> 
                    <div class="col-md-12">           
                      <select name="listaDeDispositivos" id="listaDeDispositivos" class="form-control "></select>
                    </div>
                      <video muted="muted" id="video"  width="300 px" height="300 px"></video>
                      <canvas id="canvas" style="display: none;"></canvas>                    
                      <p id="estado"></p>
              <button id="boton" class="btn btn-success">Tomar Foto</button>
            <p id=""></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-center">  
  <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Registro de Personas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="" method="post" id="formdata">
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tipo Identificación</label>
                        <select name="tipo_identificacion" class="form-control">
                                <option value="">Seleccionar</option>
                                <option  <?php echo $alm->tipo_identificacion == 'TI' ?'selected':'' ?> value="TI">Tarjeta identidad</option>
                                <option  <?php echo $alm->tipo_identificacion == 'CC' ?'selected':'' ?> value="CC">Cedula ciudadania</option>
                                <option  <?php echo $alm->tipo_identificacion == 'CE' ?'selected':'' ?> value="CE">Cedula extranjeria</option>
                                <option  <?php echo $alm->tipo_identificacion == 'PA' ?'selected':'' ?> value="PA">Pasaporte</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Identificación</label>
                        <input type="number" id="num_identificacion" name="num_identificacion" class="form-control" placeholder="" value="<?php echo $alm->num_identificacion?>" required >
                      </div>
                    </div>                    
                        <input type="hidden" id="fnacimiento" name="fnacimiento" class="form-control" placeholder="" value="null" required >                     
                        <input type="hidden" id="tsangre" name="tsangre" class="form-control" placeholder="" value="null" required >                      
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Genero</label>
                        <select name="genero" id="genero" class="form-control" required>
                          <option value="">Seleccionar</option>
                          <option  <?php echo $alm->genero == 'f' ?'selected':'' ?>  value="f" >Femenino</option>
                          <option  <?php echo $alm->genero == 'm' ?'selected':'' ?>  value="m" >Masculino</option>
                          <option  <?php echo $alm->genero == 'nd' ?'selected':'' ?> value="nd" >No definido</option>
                        </select>
                      </div>
                    </div>                    
                        <input type="hidden" id="alergias" name="alergias" class="form-control" placeholder="" value="null" required >
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" id="nombres" name="nombres" class="form-control" placeholder="" value="<?php echo $alm->nombres?>" required >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder=""  value="<?php echo $alm->apellidos?>" required >
                      </div>
                    </div>
                    
                        <input type="hidden" id="telefono" name="telefono" class="form-control" placeholder=""  value="null" required >
                        <input type="hidden" id="direccion" name="direccion" class="form-control" placeholder="" value="null" required >
                        <input type="hidden" id="correo" name="correo" class="form-control" placeholder="" value="null" required >
                        <input type="hidden" name="infraestructura_id" id="infraestructura_id" class="form-control"  value="null" require>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>Tipo Usuario</label>
                    <select name="tipo_usuario" id="tipo_usuario" class="form-control" require >
                      <option  value="8">Visitante</option>                     
                    </select>
                    </div>
                    </div> 
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>Movilidad Reducida</label>
                    <select name="mreducida" id="mreducida" class="form-control" required >                      
                      <option <?php echo $alm->mreducida == 'no' ?'selected':'' ?> value="no"> No </option>
                      <option <?php echo $alm->mreducida == 'si' ?'selected':'' ?> value="si"> Si </option>                      
                    </select>
                    </div>
                    </div>  
                    <div class="col-sm-6">
                      <div class="form-group">                        
                        <input type="hidden" id="foto" name="foto" class="form-control foto" placeholder=""  value="<?php echo $alm->foto?>" required >
                        <input type="hidden" id="id" name="id" class="form-control id" placeholder="" value="<?php echo $alm->id?>"  required >
                      </div>
                    </div>                  
                  <div class="col-md-12">
                    <input type="button" id="botonenviar" class="btn btn-default btn-block" value="REGISTRAR">              
                    <!-- /form-group -->
                  </div>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
               </form>
              </div> 
            </div>
          </div>
        </div>
        <!-- #END# Advanced Form Example With Validation -->
      </div>
    </div>
  </div>
</div>
<!-- #END# Basic Card -->
<script>   
    $(document).on('click','#botonenviar',function(e) {
    var data = $("#formdata").serialize();
    $.ajax({
         data: data,
         type: "post",
         url: "?c=usuarios&a=Registrar",
         success: function(data){
             alert('EL REGISTRO SE CREO CON EXITO');
             window.location = '?c=usuarios&a=ver';
             
         }
	});
});
</script>