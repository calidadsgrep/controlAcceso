<?php $update=$this->model->Obtener($_REQUEST['id'])?>   
<div id='result'></div>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Actualizar Permisos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="" method="post" name="permiso" id="permiso">                 
              <div class="row">
               <div class="col-md-3">
                <label for="">Crear</label>
                <select name="crear" id="crear" class="form-control">                       
                        <option  <?php echo  $update->crear == 1 ? 'selected':'' ?> value="1" >SI</option>
                        <option  <?php echo  $update->crear == 2 ? 'selected':'' ?> value="2" >NO</option>
                </select>
               </div> 
               <div class="col-md-3">
              <label for="">Leer</label>
              <select name="leer" id="leer" class="form-control">
                       <option  <?php echo $update->leer == 1 ?'selected':'' ?> value="1">SI</option>
                       <option  <?php echo $update->leer == 2 ?'selected':'' ?> value="2">NO</option>
              </select>
              </div>
              <div class="col-md-3">
              <label for="">Actualizar</label>
              <select name="actualizar" id="actualizar" class="form-control"> 
                       <option  <?php echo $update->actualizar == 1 ?'selected':'' ?> value="1" >SI</option>
                       <option  <?php echo $update->actualizar == 2 ?'selected':'' ?> value="2" >NO</option>

                       </select>              
              </div>
              <div class="col-md-3">
              <label for="">Borrar</label>
              <select name="borrar" id="borrar" class="form-control">
                       <option  <?php echo $update->borrar == 1 ?'selected':'' ?> value="1" >SI</option>
                       <option  <?php echo $update->borrar == 2 ?'selected':'' ?> value="2" >NO</option>
              </select>
              </div><br>
              </div>
              
              <div class="col-md-12"><br>
                     <input type="hidden" id="id"  name='id' value=" <?php echo $update->id ?>">
                     <input type="hidden" id="tipo_usuarios"  name='tipousuario' value=" <?php echo $update->tipo_usuarios ?>">
                     <button type="submit" id="guardar" class="btn btn-success btn-block">Actualizar</button>
                     </div>
              </div>
            
              </form>
              </div>
</div>
<script>
      $(document).on('click','#guardar',function(e) {
      var tipo_usuarios= document.getElementById('tipo_usuarios').value;
      var data = $("#permiso").serialize();
         $.ajax({
          data:data,
          type: "post",
          url: "?c=seguridad&a=actualizar",
          
          beforeSend: function() {                 
                 $("#result").html("<h5 class='text-center'> <img src='View/img/gifs/cargando-loading-009.gif'> Actualizando Información</h5>");
        // debugger;   
       },
         
         success: function(data) {  // debugger;
           $('#tabla').load('?c=seguridad&a=crud&id='+tipo_usuarios);//actualizas el div */               
         //  $("#result").html("<h5 class='text-center'> <img src='View/img/gifs/cargando-loading-009.gif'>Cargando Información</h5>");
           
         }
    });        
  });  
      
</script>