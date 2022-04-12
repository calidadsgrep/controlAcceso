<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Configurar Permisos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-4"> 
                  <label for="tipo_usuario">Tipo de usuario</label>
                  <select name="tipousuario" id="tipousuario" onchange="Permisos()" class="form-control">
                      <option value="">Seleccionar</option>
                      <option value="1">Vigilante</option>
                      <option value="2">Administrador</option>
                      <option value="3">Root</option>
                      <option value="4">Dir Operativo</option>
                      <option value="5">Propietario</option>
                      <option value="6">Inquilinos</option> 
                    </select>
              </div>
            <div id="resultado" class="col-md-12"></div>
            <div id="resultado1" class="col-md-12"></div>
            <div id="index" class="col-md-12"></div>
           </div>
        </div>

<script>  
         function Permisos() {    
        var id= document.getElementById('tipousuario').value;
        $.ajax({
         data: {id:id},
         type: "post",
         url: "?c=seguridad&a=crud",
         beforeSend: function () {
            $('#index').html("<h5 class='text-center'> <img src='View/img/gifs/cargando-loading-009.gif'> Cargando Información</h5>");
  
        },
        success: function(resp) {
           $('#resultado1').html(resp);
            //$('#resultado').html("<div class='alert alert-success'></div>");
        }
            });        
        };         
</script>


