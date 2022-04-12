<div class="card">
  <div class="card-header">
    CONTROL DE CORRESPONDENCIA
    <button class="btn btn-default bg-blue" onclick="Add(1)" data-toggle="modal" data-target="#modalCor" style="float:right;" data-=""><i class="fa fa-plus"></i> REGISTRAR</button>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-12">
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
          <thead>
            <tr>
              <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column descending">Fecha Llegada</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Guarda recibe</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tipo Correspondencia</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Destino</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Entregar</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($correpondencias as $corres) : ?>
              <tr class="odd">
                <td class="dtr-control sorting_2" tabindex="0"><?php echo $corres->fecha_llegada ?></td>
                <td><?php echo $corres->guarda_recibe ?></td>
                <td><?php echo $corres->tipo_correspondencia ?></td>
                <td><?php echo $corres->tipo . ' ' . $corres->numero ?></td>
                <td>
                  <?php if (empty($corres->fecha_entrega)) : ?>
                    <a class="btn btn-default bg-red" onclick="Edit('<?php echo $corres->id ?>')" data-toggle="modal" data-target="#modalCor" style="float:justify;" data-=""><i class="fa fa-edit"></i></a>
                  <?php else : ?>
                    <a class="btn btn-default bg-green" onclick="View('<?php echo $corres->id ?>')" data-toggle="modal" data-target="#modalCor" style="float:justify;" data-=""><i class="fa fa-eye"></i></a>
                  <?php endif; ?>

                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th rowspan="1" colspan="1">Rendering engine</th>
              <th rowspan="1" colspan="1">Browser</th>
              <th rowspan="1" colspan="1">Platform(s)</th>
              <th rowspan="1" colspan="1">Engine version</th>
              <th rowspan="1" colspan="1">CSS grade</th>
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