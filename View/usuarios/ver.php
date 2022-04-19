<?php //encriptar
date_default_timezone_set('America/Bogota');
if (isset($_REQUEST['id'])) {
  $identidad = $_REQUEST['id'];
} else {
  $identidad = $_SESSION['identidad'];
}
$resultado = $this->model->Ver($identidad);
$visitas = $this->model->Visitas($resultado->id);
$ultvis = $this->model->Ult_Visitas($resultado->id);
/*echo'<pre>';
print_r(count($ultvis));
echo'</pre>';*/
if (@$visitas[0]->asunto_sal == "Salida") {

  $accion = "Salida";
} else {
  $accion = "Acciones";
}
 if(count($ultvis)==0){
     $estado='';
 }else{
     $estado='disabled';
 }


?>
<!--<div class="container">-->
<div class="row">
  <div class="col-md-5 text-center">
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-info">
        <h3 class="widget-user-username"><?php echo ucwords($resultado->nombres . ' ' . $resultado->apellidos) ?></h3>
        <h5 class="widget-user-desc"><?php echo $resultado->tipo_identificacion . ' ' . $resultado->num_identificacion ?></h5>
        <img class="tamaño" src="<?php echo $resultado->foto ?>" alt="User Avatar">
      </div>
      <div class="widget-user-images">
      </div><br>
      <div class="card-footer">
        <div class="row">
          <div class="table-responsive">
            <h5>ULTIMAS ENTRADAS</h5>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10%;">Asunto</th>
                  <th style="width: 25%;">Fecha/Hora</th>
                  <th style="width: 10%;">Destino</th>
                  <th style="width: auto;"> <i title="Info" data-toggle="popover" data-trigger="hover" data-content="Las acciones que se pueden realizar para el control de acceso son: registrar la salida, ver datos del vehiculo, ver y registrar los datos de herramientas" class="fa fa-info-circle"></i><?php echo $accion ?> </th>
                </tr>
              </thead>
              <tbody><?php foreach ($visitas as $visita) : ?>
                  <tr>
                    <td><a onclick="Informe('<?php echo $visita->id ?>')"> <i class="fa fa-address-card"></i> <?php echo $visita->asunto ?></a> </td>
                    <td><?php echo $visita->fecha . '<br>' . $visita->hora ?></td>
                    <td><?php echo $visita->tipo . ' ' . $visita->numero ?></td>
                    <td>
                      <?php if ($visita->asunto_sal == 'Salida') : ?>
                        <?php echo $visita->fecha_sal . '<br>' . $visita->hora_sal ?>
                      <?php else : ?>
                        <a href="" onclick="Salida('<?php echo $visita->id ?>')" data-toggle="modal" data-target="#modalCar"> <i title="Info" data-placement="top" data-toggle="popover" data-trigger="hover" data-content="REGISTRO DE SALIDA" class="fa fa-user-times"></i></a>
                        <!--<a href="" data-toggle="modal" data-target="#modalCar"> <i title="Info" data-placement="top" data-toggle="popover" data-trigger="hover" data-content="VER DATOS DEL VEHICULO" class="fa fa-car"></i></a>-->
                        <a onclick="Herramientas('<?php echo $visita->id ?>')"> <i title="Info" data-placement="top" data-toggle="popover" data-trigger="hover" data-content="REGISTRAR HERRAMIENTAS" class="fa fa-wrench"></i></a>
                      <?php endif; ?>
                      <?php //echo $visita->tipo_vehiculo . ' ' . $visita->placa . ' ' . $visita->color 
                      ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
  <?php if (!isset($visita->asunto_sal) or $visita->asunto_sal == 'Salida'): ?>
    <div class="col-md-7">
      <div class="card">
        <div class="card-header">
          INGRESE LOS DATOS DE INGRESO
        </div>
        <div class="card-body">
          <div class="col-md-12">
            <form action="" name="form-ingreso" id="form-ingreso">
              <div class="row">
                <input type="hidden" id='funcionario' name="funcionario" class="form-control" value="<?php echo $_SESSION['full_name'] ?>">
                <input type="hidden" id='visitante_id' name="visitante_id" class="form-control" value="<?php echo $resultado->id ?>">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Fecha</label>
                    <input type="date" id='fecha' name="fecha" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Hora</label>
                    <input type="text" id='hora' name="hora" class="form-control" value="<?php echo date('H:i:s a') ?>" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Asunto</label>
                    <select id="asunto" name="asunto" class="form-control" required>
                      <!--<option value="">Seleccionar</option>-->
                      <option value="Entrada">Entrada</option>
                      <!--<option value="Salida">Salida</option>-->
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Destino</label>
                    <select id="destino" name="destino" class="form-control" onchange="Destino(this.value)" required>
                      <?php $infras = $this->model->ObtenerInmuebles($_SESSION['infraestructura']); ?>
                      <option value="">seleccionar</option>
                      <?php foreach ($infras as $infra) : ?>
                        <option value="<?php echo $infra->id ?>"><?php echo $infra->tipo . ' ' . $infra->numero ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4" id="index"></div>
                <div class="col-md-3 div_a_mostrar0" id="">
                  <div class="form-group">
                    <label for="">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control" required>
                      <option value="">seleccionar</option>
                      <option value="Automovil">Automovil</option>
                      <option value="Motocicleta">Motocicleta</option>
                      <option value="bicicleta">bicicleta</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3 div_a_mostrar1" id="">
                  <label for="">Placa</label>
                  <input type="text" name="placa" id="placa" class="form-control">
                </div>
                <div class="col-md-2 div_a_mostrar1" id="">
                  <label for="">Color</label>
                  <input type="text" name="color" id="color" class="form-control">
                </div>
              </div>
              <div class="custom-control custom-checkbox col-md-2">
                <input class="custom-control-input checkshow" type="checkbox" id="customCheckbox1" value="option1">
                <label for="customCheckbox1" class="custom-control-label">Vehiculo</label>
              </div>
          </div>
        </div>
        </form>
        <div class="card-footer">
          <button type="button" class="btn btn-danger" id="upSubmit" <?php echo $estado ?> ><i class="fa fa-save"></i> Guardar</button>
          <div class="text-danger align-middle" id="Msg"></div>
        </div>
      </div>
      <div id="informe" class="informe">
        <div id="herramientas" class="herramientas">
        </div>
      </div>
    <?php endif; ?>

    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalCar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">REGISTRO DE SALIDA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body " id="salida">
        ...
      </div>

    </div>
  </div>
</div>

<!-- Modal 
<div class="modal fade" id="modalinfo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">INFORME DE VISITA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body " id="salida">
        ...
      </div>

    </div>
  </div>
</div>-->
<style>
  .tamaño {
    border: 3px solid #fff;
    height: auto;
    width: 150px;
  }
  .modal-lg { max-width: 80% !important; }


</style>

<script>
  function Herramientas(id) {
    $('#herramientas').html(
      '<div class="loading"><img src="view/img/gifs/cargando-loading-009.gif" alt="loading" />&nbsp;&nbsp;Procesando, por favor espere...desliza hacia abajo</div>'
    ).fadeIn("300");
    $.ajax({
      data: {
        id: id
      },
      type: "post",
      url: "?c=accesopersonas&a=herramientas",
      success: function(data) {
        $('#herramientas').html(data).fadeIn("200");
        $('#respuesta').html("").fadeIn("200");


      }
    });

  }


  function Informe(id) {
    $('#informe').html(
      '<div class="loading"><img src="view/img/gifs/cargando-loading-009.gif" alt="loading" />&nbsp;&nbsp;Procesando, por favor espere...desliza hacia abajo</div>'
    ).fadeIn("300");
    $.ajax({
      data: {
        id: id
      },
      type: "post",
      url: "?c=accesopersonas&a=infovisita",
      success: function(data) {
        $('#informe').html(data).fadeIn("200");
        $('#respuesta').html("").fadeIn("200");


      }
    });

  }

  function Destino(sel) {
    $.ajax({
      data: {
        id: sel
      },
      type: "post",
      url: "?c=accesopersonas&a=habitantes",
      success: function(data) {
        $('#index').html(data).fadeIn("200");
        $('#respuesta').html("").fadeIn("200");


      }
    });

  }

  function Salida(sel) {
    $.ajax({
      data: {
        id: sel
      },
      type: "post",
      url: "?c=accesopersonas&a=salida",
      success: function(data) {
        $('#salida').html(data).fadeIn("200");
        $('#respuesta').html("").fadeIn("200");


      }
    });

  }

  $(function() {

    // obtener campos ocultar div
    var checkbox = $(".checkshow");
    var hidden = $(".div_a_mostrar0");
    var hidden1 = $(".div_a_mostrar1");
    //var populate = $("#populate");

    hidden.hide();
    hidden1.hide();
    checkbox.change(function() {
      if (checkbox.is(':checked')) {
        //hidden.show();
        $(".div_a_mostrar0").fadeIn("200")
        $(".div_a_mostrar1").fadeIn("200")
      } else {
        //hidden.hide();
        $(".div_a_mostrar0").fadeOut("200")
        $(".div_a_mostrar1").fadeOut("200")
        $("#tipo , #placa, #color").val(""); // limpia los valores de lols input al ser ocultado
        $('input[type=checkbox]').prop('checked', false); // limpia los valores de checkbox al ser ocultado

      }
    });
  });
</script>



<script type="text/javascript">
  /**GUARDAR**/
  $(document).ready(function(e) {
    $(document).on("click", "#upSubmit", function() {
      var data = $("#form-ingreso").serialize();
      var asunto = document.getElementById('asunto').value;
      var destino = document.getElementById('destino').value;


      if (destino == "") {

        /*if (asunto == "") {
          alert("Por favor, seleccionar el asunto");
          $("#asunto").focus();
          // document.getElementById(asunto).focus();
        }

        if (destino == "") {
          alert("Por favor, seleccionar el destino");
          $("#destino").focus();
          //document.getElementById(destino).focus();
        }

        /*if (destino != "") {
          var habitante = document.getElementById(habitante).value;
          if (habitante == "") {
            alert("Por favor, seleccionar el responsable");
            $("#habitante").focus();
            document.getElementById(habitante).focus();
          }
        }*/

        return false;
      } else {
        $('#Msg').html(
          '<div class="loading"><img src="view/img/gifs/cargando-loading-009.gif" alt="loading" />&nbsp;&nbsp;Procesando, por favor espere...</div>'
        ).fadeIn("200");
        $.ajax({
          url: "?c=accesopersonas&a=registrar",
          type: "POST",
          cache: false,
          data: data,
          success: function(data) {
            if (data != 1) {
              jQuery('#fecha').val('');
              $("#Msg").html("<div class='alert-success'>Registrado.</div>").fadeOut("200");
              //$('#form-ingreso').load(location.href + " #form-ingreso");
              window.location = "?c=usuarios&a=ver&id=" + <?php echo $identidad ?>;

            } else {
              jQuery('#fecha').val('');
              $("#Msg").html(
                "<div class='alert alert-danger' role='alert'>Error.</div>");
            }
          }
        });
      }
    });

  });
</script>