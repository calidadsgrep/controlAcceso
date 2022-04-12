<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">PERSONAS</h3>
                <a href="?c=usuarios&a=add" class="btn btn-default btn-sm  float-sm-right"  >Crear Nuevo</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <!--<th>id</th>-->
                    <th>Foto</th>
                    <th>Identificación</th>
                    <th>Nombre(s)</th>
                    <th>Apellido(s)</th>
                    <th>Telefono</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Creación</th>
                    <th>Menu</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $infras = $this->model->Listar(); ?>
                    <?php  //print_r($infras)?>
                    <?php foreach($infras as $infra): ?>
                  <tr>
                    <!--<td><?php echo $infra->user_id ?></td>-->
                    <td><img src="<?php echo $infra->foto ?>" width="100" height="80">       </td>
                    <td><?php echo $infra->tipo_identificacion.'. '.$infra->num_identificacion ?></td>
                    <td><?php echo $infra->nombres ?></td>
                    <td><?php echo $infra->apellidos ?></td>
                    <td><?php echo $infra->telefono ?></td>
                    <td><?php echo $infra->tipo ?></td> 
                    <td><?php echo ($infra->estado == 1 ) ? "Activo" : "Inactivo";?></td>
                    <td><?php echo $infra->created ?></td>                    
                    <td>
                   <!-- <a  onclick="Add('<?php echo $infra->infra ?>')" data-toggle="modal" data-target="#modal-default"><span class="glyphicon glyphicon-edit"  title="icon name" aria-hidden="true"></span> </a>
                    <a  onclick="Edit('<?php echo $infra->infra ?>')" data-toggle="modal" data-target="#modal-default"><span class="glyphicon glyphicon-edit"  title="icon name" aria-hidden="true"></span>Editar </a>-->
                    <a href="?c=usuarios&a=add&id=<?php echo $infra->user_id ?>" class="btn btn-default btn-sm  float-sm-right">Editar </a>
                  </td>
                  </tr>
                  <?php  endforeach; ?> 
                  </tbody>
                  <tfoot>
                  <tr>
                   <!--<th>id</th>-->
                    <th>Foto</th>
                    <th>Identificación</th>
                    <th>Nombre(s)</th>
                    <th>Apellido(s)</th>
                    <th>Telefono</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Creación</th>
                    <th>Menu</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

 <!-- /.modal 
 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Launch Default Modal
                </button>-->
 <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
            <div class="index" id="index">
            </div>
           </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->   
   <script>
        function Add(){
          $('#index').html("<h5>Cargando Complementos</h5>");
    $.ajax({
        type: "POST",
        url: '?c=usuarios&a=add',
       // data: 'solicitante=' + val,
        success: function(resp) {
            $('#index').html(resp);
            $('#respuesta').html("");
        }
    });
        }

        function Inmue(val){
          $('#index').html("<h5>Cargando Complementos</h5>");
        $.ajax({
        type: "POST",
        url: '?c=inmuebles&a=add',
        data: 'infra_id=' + val,
        success: function(resp) {
            $('#index').html(resp);
            $('#respuesta').html("");
        }
          });
        }


        function Edit(val){
          $('#index').html("<h5>Cargando Complementos</h5>");
        $.ajax({
        type: "POST",
        url: '?c=condominios&a=crud',
        data: 'id=' + val,
        success: function(resp) {
            $('#index').html(resp);
            $('#respuesta').html("");
        }
          });
        }

      </script>