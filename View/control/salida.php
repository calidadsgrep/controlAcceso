<?php date_default_timezone_set('America/Bogota');
session_start() ?>
<form id='form-salida' name="form-salida">
    <div class="col-md-12 text-center">
        <div class="row">

            <input type="hidden" name='id' id="id" value="<?php echo $sali->id ?>">
            <input type="hidden" id='funcionario' name="funcionario" class="form-control" value="<?php echo $_SESSION['full_name'] ?>">
            <div class="col md-4">
                <div class="form-group">
                    <label for="">Fecha Salida</label>
                    <input type="date" class="form-control" id='fecha' name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>
            </div>
            <div class="col md-4">
                <div class="form-group">
                    <label for="">Hora Salida</label>
                    <input type="text" class="form-control" id='hora' name="hora" value="<?php echo date('H:i:s a') ?>" readonly>
                </div>
            </div>
            <?php if ($sali->tipo_vehiculo != '') :
                $selected = 'selected';
            ?>

            <?php else :
                $selected = '';
            ?>
            <?php endif; ?>
            <div class="col-md-3 text-center">
                <label>Salida del Vehiculo</label>
                <select name="svehiculo" id="svehiculo" class="form-control">
                    <option value="si" <?php echo $selected ?>>Si</option>
                    <option value="no">No</option>
                    <option value="no ingreso" <?php echo $selected ?>>No Ingreso</option>
                </select>
            </div>
            <?php if ($sali->tipo_vehiculo != '') : ?>
                <div class="col-md-8 text-center">
                    <strong><?php echo $sali->tipo_vehiculo . '<br> PLACA: ' . $sali->placa . ', COLOR: ' . $sali->color ?></strong>
                </div>
            <?php endif; ?>


            <div class="col-md-12 text-center">
                <label>Salida de Objetos</label>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 45%;">Nombre</th>
                        <th style="width: 45%;">Cantidad</th>
                        <th style="width: 10%;">Salida</th>
                    </tr>
                <?php foreach($tools as $tool): ?>
                    <tr>
                        <td><?php echo $tool->item ?></td>
                        <td><?php echo $tool->cantidad ?></td>
                        <td><input type="checkbox" name="salida[<?php echo $tool->id ?>]" value="0" checked></td>
                    </tr>
                    <?php endforeach; ?>
                </table>


              <!--
                <select name="objetos" id="objetos" class="form-control">
                    <option value="si">Si</option>
                    <option value="no">No</option>
                    <option value="no ingreso">No Ingreso</option>
                </select>
            -->
            </div>
            <div class="col-md-12 text-center">
                <label>Observación</label>
                <textarea name="observacion" id="observacion" class="form-control" type="text" value=""></textarea>
            </div>
            <div class="col-md-12"><br>
                <div class="text-danger align-middle" id="Msg"></div>
                <button type="button" class="btn btn-danger btn-block" id="upSubmit1"><i class="fa fa-save"></i> Guardar</button>
            </div>

        </div>
</form>
</div>
</div>
<script>
    $(document).ready(function(e) {
        $(document).on("click", "#upSubmit1", function() {
            var data = $("#form-salida").serialize();
            // var fecha = document.getElementById('fecha').value;
            // var id = document.getElementById('id').value;
            $('#Msg1').html(
                '<div class="loading"><img src="view/img/gifs/cargando-loading-009.gif" alt="loading" />&nbsp;&nbsp;Procesando, por favor espere...</div>'
            ).fadeIn("200");
            $.ajax({
                //data: {id:id,fecha:fecha},
                data: data,
                url: "?c=accesopersonas&a=registrarsalida",
                type: "POST",
                cache: false,

                success: function(data) {
                    if (data != 1) {
                        jQuery('#fecha').val('');
                        $("#Msg1").html("<div class='alert-success'>Registrado.</div>").fadeOut("200");
                        // $('#table-responsive').load(location.href + " #table-responsive");
                        // window.location = "?c=usuarios&a=ver&id=" + 8;
                        window.location.reload();

                    } else {
                        jQuery('#fecha').val('');
                        $("#Msg1").html(
                            "<div class='alert alert-danger' role='alert'>Error.</div>");
                    }
                }
            });
        });
    });
</script>