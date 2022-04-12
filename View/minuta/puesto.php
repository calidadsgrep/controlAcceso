<?php
$validar = $this->model->Validar_entrega();
$cant = count($validar);
//print_r($cant);

if ($cant == 1) {
    $recibe = "checked";
    $entrega = "";
}
if ($cant == 0) {
    $recibe = "";
    $entrega = "checked";
} ?>
<!-- Basic Card -->
<div class="row clearfix">
    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Control/Registro Diario del Puesto<br> <small><?php echo strtoupper($_SESSION['full_name']) ?></small>
                </h3>
            </div>
            <div class="card-body">
                <form action="?c=Control_ingreso&a=add_tramite" method="POST">
                    <div class="row clearfix">
                        <!--columna 1-->
                        <div class="col-sm-4 text-center">
                            <h2 class="card-inside-title">Tramite</h2>
                            <div class="demo-radio-button">

                                <input name="tramite" type="radio" id="radio_1" class="radio-col-red" value="entrega" <?php echo $entrega ?> />
                                <label for="radio_1">Entrega</label>
                                <br>
                                <input name="tramite" type="radio" id="radio_2" class="radio-col-red" value="recibe" <?php echo $recibe ?> />
                                <label for="radio_2">Recibe</label>
                                <br>
                                <input name="tramite" type="radio" id="radio_3" class="radio-col-red" value="novedad" />
                                <label for="radio_3">Novedad</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="hidden" name="portero_id" class="form-control" value='<?php echo $datos[0]['id'] ?>' />
                                <input type="hidden" name="puesto_id" class="form-control" value='<?php echo $_SESSION['puesto'] ?>' />
                                <div class="form-line">
                                    <label for="">Fecha</label>
                                    <input type="date" name="f_entrega" class="form-control" placeholder="Fecha de Entrega" value='<?php echo date('Y-m-d') ?>' readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Hora</label>
                                    <input type="text" name="h_entrega" class="form-control" placeholder="" value='<?php echo date('h:i:s A') ?>' readonly />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Observación</label>

                                    <textarea type="text" name="observacion" cols="30" rows="5" class="form-control" placeholder="Digite aqui si hay alguna evento que desee registrar"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-default bg-red "> <i class="fa fa-save"></i> GUARDAR</button>
                        </div>
                    </div>
            </div>
        </div>
        </form>
    </div>
    <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h2>Inventario del Puesto</h2>
                <div class="header-dropdown m-r--5">
                    <button type="" onclick="Index(<?php echo $_SESSION['infraestructura'] ?>);" data-toggle="modal" data-target="#largeModal" class="btn btn-primary btn-lg m-l-15 waves-effect">
                        Registrar
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row clearfix">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center" WIDTH="15%">Cantidad</th>
                                    <th class="text-center" WIDTH="50%">Item</th>
                                    <th class="text-center" WIDTH="15%">Estado</th>
                                    <th class="text-center" WIDTH="15%">Usuario</th>
                                    <th class="text-center" WIDTH="15%">Novedad</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-center" WIDTH="15%">Cantidad</th>
                                    <th class="text-center" WIDTH="50%">Item</th>
                                    <th class="text-center" WIDTH="15%">Estado</th>
                                    <th class="text-center" WIDTH="15%">Usuario</th>
                                    <th class="text-center" WIDTH="15%">Novedad</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($this->model->ObtenerInv($_SESSION['infraestructura']) as $inventario) : ?>
                                    <tr>
                                        <td><?php echo $inventario->cantidad ?></td>
                                        <td><?php echo ucwords($inventario->item) ?></td>
                                        <td><?php echo ucwords($inventario->estado) ?></td>
                                        <td><?php echo ucwords($inventario->usuario) ?></td>
                                        <td>
                                            <a onclick="Update(<?php echo $inventario->id ?>);" class="" data-toggle="modal" data-target="#smallModal"><i class="material-icons">edit</i></a>
                                            <!-- <a onclick="javascript:return confirm('Estas seguro que deseas eliminar el registro?')" href="?c=control_ingreso&a=Eliminar&id=<?php echo $inventario->id ?>"> <i class="material-icons">clear</i></a>-->
                                        </td>
                                    </tr>
                            </tbody>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- #END# Basic Card -->

<!-- // Inventario -->
<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body index" id="index">
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function Index(val)
        {
            $('#index').html("<h5>Cargando Complementos</h5>");
            $.ajax({
                type: "POST",
                url: 'View/minuta/inventario.php',
                data: 'puesto_id='+val,
                success: function(resp){
                    $('#index').html(resp);
                    $('#respuesta').html("");
                }
            });
        }

    function Update(val)
        {
            $('#update').html("<h5>Cargando Complementos</h5>");
            $.ajax({
                type: "POST",
                url: '?c=Control_ingreso&a=crud',
                data: 'item_id='+val,
                success: function(resp){
                    $('#update').html(resp);
                    $('#respuesta').html("");
                }
            });
        }



        function Delete(val)
        {
            $('#update').html("<h5>Cargando Complementos</h5>");
            $.ajax({
                type: "POST",
                url: '?c=Control_ingreso&a=Eliminar',
                data: 'id='+val,
                success: function(resp){
                    $('#update').html(resp);
                    $('#respuesta').html("");
                }
            });
        }

</script>