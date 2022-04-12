<div class="card">
    <div class="card-header">
        ::REGISTRO DE OBJETOS::<small>MATERIALES,HERRAMIENTAS</small>
        <div id="tools"></div>
    </div>
    <form id='form-tools' name="form-tools">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-default"><i class='fa fa-camera'></i> Tomar Foto</button>
                    <button id="addRow" type="button" class="btn btn-default"> <i class='fa fa-plus'></i> Agregar Item</button>
                    <!-- <button id="addRow" type="button" class="btn btn-info">Agregar</button>-->
                </div>
                <input type="hidden" name="visita" value="<?php echo $_REQUEST['id']?>" >
                <div class="col-md-4">
                    <label for="">ITEM</label>
                    <input type="text" name="item[]" class="form-control">
                </div>
                <div class="col-md-4"><label for="">CANTIDAD</label>
                    <input type="number" name="cantidad[]" min="1" class="form-control">
                </div>

                <div id="newRow" class="col-md-12"></div>

            </div>
        </div>
    </form>
    <div class="card-footer">        
        <button id="enviar" class="btn btn-danger"><i class="fa fa-save"></i> Guardar </button>
    </div>
</div>

<script type="text/javascript">
    // agregar registro
    $("#addRow").click(function() {
        var html = '';
        html += '<div id="inputFormRow" >';
        html += '<div class="input-group">'
        html += '<div class="row">';
        html += '<div class="col-md-5">';
        html += '<label for="">ITEM</label>';
        html += '<input type="text" name="item[]" class="form-control">';
        html += '</div>';
        html += '<div class="col-md-6">';
        html += '<label for="">CANTIDAD</label>';
        html += '<div class="input-group">';
        html += '<input type="number" name="cantidad[]" class="form-control" min="1">';
        html += '<span class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger "><i class="fa fa-trash"><i></button>';
        html += '</span>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $('#newRow').append(html);
    });

    // borrar registro
    $(document).on('click', '#removeRow', function() {
        $(this).closest('#inputFormRow').remove();
    });
</script>

<script type="text/javascript">
    /**GUARDAR**/
    $(document).ready(function(e) {
        $(document).on("click", "#enviar", function() {
            var data = $("#form-tools").serialize();
            /* var asunto = document.getElementById('asunto').value;
             var destino = document.getElementById('destino').value;*/
            $('#tools').html(
                '<div class="loading"><img src="view/img/gifs/cargando-loading-009.gif" alt="loading" />&nbsp;&nbsp;Procesando, por favor espere...</div>'
            ).fadeIn("200");

            $.ajax({
                url: "?c=accesopersonas&a=herramientasadd",
                type: "POST",
                cache: false,
                data: data,

                success: function() {
                    window.location.reload();
                }


                
                /*  success: function(data) {
                      if (data != 1) {
                          debugger;
                          // jQuery('#fecha').val('');
                          //$("#Msg").html("<div class='alert-success'>Registrado.</div>").fadeOut("200");
                          //$('#form-ingreso').load(location.href + " #form-ingreso");
                          //

                      } else {
                          jQuery('#fecha').val('');
                          $("#Msg").html(
                              "<div class='alert alert-danger' role='alert'>Error.</div>");
                      }
                  }*/
            });

        });

    });
</script>