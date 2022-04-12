<?php 
 if(isset($_REQUEST['id'])){
     $estado='readonly';
     $select='disabled';
 }else{
    $estado='';
 } 
?>
<div class="card card-danger ">
    <div class="card-body">
        <form action="" name="form-corres" id="form-corres">
            <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'] ?>">
            <input type="hidden" name="guarda_recibe" id="guarda_recibe" value="<?php echo $_SESSION['full_name'] ?>">

            <div class="row">
                <div class="col-3">
                    <label for="">Fecha Llegada</label>
                    <input name="fecha_llegada" id="fecha_llegada" type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" <?php echo $estado?> >
                </div>
                <div class="col-4">
                    <label for="">Tipo Correspondencia</label>
                    <input name="tipo_correspondencia" id="tipo_correspondencia" type="text" class="form-control" value="<?php echo $corres->tipo_correspondencia ?>" placeholder="" <?php echo $estado?> >
                </div>
                <div class="col-5">
                    <label for="">Destino</label>
                    <select name="destino" id="destino" class="select2bs4">
                        <option value="">Buscar</option>
                        <?php foreach ($destinos as $destino) : ?>
                            <option   <?php echo $destino->inmue == $corres->destino ?  "selected" : '' ?>   value="<?php echo  $corres->destino ?>"><?php echo  $destino->tipo . ' ' . $destino->numero ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php if(isset($_REQUEST['id'])): ?>
                <div class="col-3">
                    <label for="">Fecha Entrega</label>
                    <input name="fecha_entrega" id="fecha_entrega" type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" placeholder="" <?php echo $estado?> >
                </div>
                <div class="col-3">
                    <label for="">Guarda Entrega</label>
                    <input name="guarda_entrega" id="guarda_entrega" type="text" class="form-control" value="<?php echo $_SESSION['full_name'] ?>" placeholder="" <?php echo $estado?> >
                </div>
                <div class="col-3">
                    <label for="">Residente Recibe</label>
                    <select name="residente_recibe" id="residente_recibe" class="form-control select2bs4"  required>
                    <option value="">Buscar</option>    
                    <?php foreach ($residentes as $residente) : ?>
                            <option value="<?php echo  $residente->id ?>"><?php echo  $residente->fullName ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; ?>
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
        var data = $("#form-corres").serialize();
        $.ajax({
            data: data,
            type: "post",
            url: "?c=correspondencias&a=crud",
            success: function(resp) {
                $('#index').html(resp);
                $('#respuesta').html("<div class='alert alert-success'></div>");
                window.location.reload();
            }
        });
    });
</script>