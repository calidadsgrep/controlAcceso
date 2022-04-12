<?php
//sleep(1);
     $buscar = $this->model->Obtener($_REQUEST['fname']);
     //print_r($buscar);
?>
<!-- Basic Card -->
<br>
<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
    <div class="card">
      <div class="header">
        <h4>         
          <small>Resultado de la Busqueda</small>
        </h4>
      </div>
      <?php if(empty($buscar)):?>
        <h1>No hay resultados </h1>
        <div class="col-md-12 text-center"><br>
          <p><a href="?c=usuarios&a=add_ingreso"  class="btn btn-default btn-block">Crear Registro</a></p>
        </div>     
        
        
        <?php else:?>
      <div class="body">
        <div class="row clearfix">
            <div class="col-md-12 text-center">
                 <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>Identificación</th>                         
                                      <th>Nombres</th>                                      
                                      <th>Apellidos</th>
                                      <th>Menu</th>
                                  </tr>
                              </thead>
                               <tbody>
                                <?php foreach($buscar as $pers) :?>
                                <tr>
                                  <td><?php echo $pers->num_identificacion ;?></td>
                                  <td><?php echo $pers->nombres ;?></td>
                                  <td><?php echo $pers->apellidos ;?></td>    
                                  <td>
                                     <a href="?c=usuarios&a=ver&id=<?php echo $pers->num_identificacion ?>" title="Registrar Ingreso" ><i class="far fa-address-card"></i></a>
                                     <a href="" title="Editar Información" ><i class="far fa-edit"></i></a>
                                  </td>                              
                                </tr>
                                <?php endforeach;?>       
                               </tbody>
                            </table>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
  </div>

  <script>
    function Registrar(){
  
   $.ajax({
           // data: parametros,
           
           
            url: '?c=usuarios&a=add',
           // url: '?c=Accesopersonas&a=crear_personas',
            type: 'post',
            beforeSend: function() {
                //$("#salida").html("<p align='center'></p>");
                $("#resultados").html(                
                    '<div class="loading"><img src="View/img/gifs/cargando-loading-009.gif" alt="loading" width="25" height="25" />&nbsp;&nbsp; <br>...Buscando...<br>por favor espere...</div>'
                );
            },
            success: function(response) {
                $("#resultados").html(response);
            },
            error: function() {
                alert("error")
            }
        });



 }
  </script>