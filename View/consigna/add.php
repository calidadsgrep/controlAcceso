<div class="card card-danger ">
    <div class="card-body">
        <form action="" name="form-consignas" id="form-consignas">
            <!--<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'] ?>">-->
            <input type="hidden" name="fecha_reg" id="fecha_reg" value="<?php echo date('Y-m-d'); ?>">
            <div class="row">
                <div class="col-4">
                    <label for="">Cliente</label>
                    <select name="infraestructura_id" id="infraestructura_id" class="form-control select2bs4">
                        <option value="">Seleccionar</option>
                        <?php foreach ($infras as $infra) : ?>
                            <option value="<?php echo $infra->id ?>"><?php echo  $infra->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-4" id='personas'>
                    <label for="">Dirigido A:</label>
                    <select name="dirigido_a" id="dirigido_a" class="form-control select2bs4">
                        <option value="">Seleccionar</option>
                    </select>

                </div>
                <div class="col-4" id='personas'>
                    <label for="">Duración:</label>
                    <input type="number" name="duracion" id="duracion" min="1" step="1" max="7" class="form-control" value="1">
                </div>
                <div class="col-12">
                    <label for="">Consigna</label>
                    <textarea name="consigna" id="consigna" cols="30" rows="10" class="form-control"></textarea>
                </div>

            </div>
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button class="btn btn-success btn-block" id='enviar' name='enviar'><i class="fa fa-"></i>Guardar</button>
    </div>
</div>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2bs4').select2({

        });
    });
    $(document).on('click', '#enviar', function(e) {
        var data = $("#form-consignas").serialize();
        $.ajax({
            data: data,
            type: "post",
            url: "?c=consignas&a=crud",
            success: function(resp) {
                $('#index').html(resp);
                $('#respuesta').html("<div class='alert alert-success'></div>");
                window.location.reload();
            }
        });
    });

    $(document).ready(function() {
        $("#infraestructura_id").on('change', function() {            
            var id = $(this).val() //obtenemos el valor seleccionado en una variable            
            $.ajax({
                data: 'id=' + id,
                type: "post",
                url: "?c=consignas&a=personas",
                success: function(resp) {
                    $('#personas').html(resp);
                    $('#respuesta').html("<div class='alert alert-success'></div>");

                }
            });


        })

    })
</script>