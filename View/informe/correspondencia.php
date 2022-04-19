<div class="card">
  <div class="card-header">
    CORRESPONDENCIA SIN ENTREGAR
    <!-- <button class="btn btn-default bg-blue" onclick="Add(1)" data-toggle="modal" data-target="#modalCor" style="float:right;" data-=""><i class="fa fa-plus"></i> REGISTRAR</button>-->
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-12">
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
          <thead>
            <tr>
              <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column descending">Fecha Llegada</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Guarda recibe</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tipo Correspondencia</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Destino</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tiempo Custodia </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($correspondencia as $corres) : ?>
              <tr class="odd">
                <td class="dtr-control sorting_2" tabindex="0"><?php echo $corres->fecha_llegada ?></td>
                <td><?php echo $corres->guarda_recibe ?></td>
                <td><?php echo $corres->tipo_correspondencia ?></td>
                <td><?php echo $corres->tipo . ' ' . $corres->numero ?></td>
                <td>
                  <?php
                  $firstDate  = new DateTime($corres->fecha_llegada);
                  $secondDate = new DateTime(date('Y-m-d'));
                  $intvl = $firstDate->diff($secondDate);
                  echo  $intvl->d . " dias";

                  ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column descending">Fecha Llegada</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Guarda recibe</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tipo Correspondencia</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Destino</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tiempo Custodia </th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-top modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">INFORMACIÓN DE LA CORRESPONDENCIA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  add" id="add">
        ...
      </div>

    </div>
  </div>
</div>


<script>
  function Add() {
    $.ajax({
      type: "post",
      url: "?c=correspondencias&a=add",
      success: function(resp) {
        $('#add').html(resp);
        $('#respuesta').html("");
      }
    });

  }

  function Edit($id) {
    var id = $id;
    $.ajax({
      data: {
        id: id
      },
      type: "post",
      url: "?c=correspondencias&a=add",
      success: function(resp) {
        $('#add').html(resp);
        $('#respuesta').html("");
      }
    });
  }

  function View($id) {
    var id = $id;
    $.ajax({
      data: {
        id: id
      },
      type: "post",
      url: "?c=correspondencias&a=view",
      success: function(resp) {
        $('#add').html(resp);
        $('#respuesta').html("");
      }
    });
  }
</script>