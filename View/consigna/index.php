<div class="card">

    <div class="card-header">Consignas
        <button class="btn btn-default bg-blue" onclick="Add(1)" data-toggle="modal" data-target="#modalCor" style="float:right;" data-=""><i class="fa fa-plus"></i> REGISTRAR</button>

    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Num</th>
                    <th>Consigna</th>
                    <th>Registro</th>
                    <th>Dirigido(A)</th>
                    <th>Cliente </th>
                  <!--  <th>MENU</th>-->
                </tr>
            </thead>
            <tbody>
                <?php  //print_r($cons)
                ?>
                <?php foreach ($cons as $con) : ?>
                    <tr>
                        <td><?php echo $con->id ?></td>
                        <td><?php echo $con->consigna ?></td>
                        <td><?php echo $con->fecha_reg ?></td>
                        <td><?php echo $con->fullname ?></td>
                        <td><?php echo $con->nombre ?></td>
                       <!-- <td>
                            <a href="?c=inmuebles&a=index&id=<?php echo $infra->infra  ?>">Inmuebles</a>
                            <a  onclick="Inmue('<?php echo $infra->infra ?>')" data-toggle="modal" data-target="#modal-default"><span class="glyphicon glyphicon-edit"  title="icon name" aria-hidden="true"></span>Inmuebles </a>
                            <a onclick="Edit('<?php echo $infra->infra ?>')" data-toggle="modal" data-target="#modal-default"><span class="glyphicon glyphicon-edit" title="icon name" aria-hidden="true"></span>Editar </a>-->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Num</th>
                    <th>Consigna</th>
                    <th>Registro</th>
                    <th>Dirigido(A)</th>
                    <th>Cliente </th>
                    <!--<th>MENU</th>-->
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-top modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">REGISTRAR CONSIGNA</h5>
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
      url: "?c=consignas&a=add",
      success: function(resp) {
        $('#add').html(resp);
        $('#respuesta').html("");
      }
    });

  }
  </script>