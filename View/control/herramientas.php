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
                    <label for="">NOMBRE</label>
                    <input type="text" name="item[]" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="">TIPO</label>
                    <select name="tipo[]" id="tipo" class="form-control" required>
                    <option value="">Seleccionar</option>
                    <option value="Herramienta">Herramienta/Equipo</option>    
                    <option value="Consumo">Consumo</option>
                    </select>
                    <!--<input type="text" name="cantidad[]" min="1" class="form-control">-->
                </div>
                <div class="col-md-3"><label for="">CANTIDAD</label>
                    <input type="text" name="cantidad[]"  class="form-control" required>
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
        html += '<div class="col-md-4">';
        html += '<label for="">NOMBRE</label>';
        html += '<input type="text" name="item[]" class="form-control">';
        html += '</div>';
        html += '<div class="col-md-4">'
        html += '<label for="">TIPO</label>'
        html += '<select name="tipo[]" id="tipo" class="form-control" required>'
        html += '<option value="">Seleccionar</option>'
        html += '<option value="Herramienta">Herramienta/Equipo</option> '   
        html += '<option value="Consumo">Consumo</option>'
        html += '</select>  '                  
        html += '</div>'
        html += '<div class="col-md-3">';
        html += '<label for="">CANTIDAD</label>';
        html += '<div class="input-group">';
        html += '<input type="text" name="cantidad[]" class="form-control" min="1">';
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
            });

        });

    });
</script>