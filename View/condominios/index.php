<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">CLIENTES</h3>
            <a class="btn btn-default btn-sm  float-sm-right" data-toggle="modal" data-target="#modal-default" onclick="Crud()">Crear Nuevo</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <!--<th>id</th>-->
                  <th>NIT</th>
                  <th>NOMBRE</th>
                  <th>TELEFONO(s)</th>
                  <th>DIRECCION</th>
                  <th>ADMINISTRADOR(A)</th>
                  <th>MENU</th>
                </tr>
              </thead>
              <tbody>
                <?php $infras = $this->model->Listar(); ?>
                <?php  //print_r($infras)
                ?>
                <?php foreach ($infras as $infra) : ?>
                  <tr>
                    <!--<td><?php echo $infra->infra ?></td>-->
                    <td><?php echo $infra->nit ?></td>
                    <td><?php echo $infra->infra_nom ?></td>
                    <td><?php echo $infra->direccion ?></td>
                    <td><?php echo $infra->telefono ?></td>
                    <td><?php echo $infra->administrador ?></td>
                    <td>

                      <a href="?c=inmuebles&a=index&id=<?php echo $infra->infra  ?>">Inmuebles</a>
                      <!--<a  onclick="Inmue('<?php echo $infra->infra ?>')" data-toggle="modal" data-target="#modal-default"><span class="glyphicon glyphicon-edit"  title="icon name" aria-hidden="true"></span>Inmuebles </a>-->
                      <a onclick="Edit('<?php echo $infra->infra ?>')" data-toggle="modal" data-target="#modal-default"><span class="glyphicon glyphicon-edit" title="icon name" aria-hidden="true"></span>Editar </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <!--<th>id</th>-->
                  <th>NIT</th>
                  <th>NOMBRE</th>
                  <th>TELEFONO(s)</th>
                  <th>DIRECCION</th>
                  <th>ADMINISTRADOR(A)</th>
                  <th>MENU</th>
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
    function Crud() {
      $('#index').html("<h5>Cargando Complementos</h5>");
      $.ajax({
        type: "POST",
        url: '?c=condominios&a=crud',
        // data: 'solicitante=' + val,
        success: function(resp) {
          $('#index').html(resp);
          $('#respuesta').html("");
        }
      });
    }

    function Inmue(val) {
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


    function Edit(val) {
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