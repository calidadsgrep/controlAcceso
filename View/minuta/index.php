<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="body">
            <div class="row clearfix">
                <div class="col-xs-12 col-md-12 text-center">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <tr>
                                <th colspan="1" class="text-center active"> <img src="View\img\logo\censig.png"
                                        width="60px" height="auto"> </th>
                                <th colspan="2" class="text-center active">LIBRO MINUTA DIARIA</th>
                                <th colspan="1" class="text-center active">
                                    <a href="?c=minutas&a=puesto" type="" class="btn btn-default "><i class="fa fa-plus"></i> REGISTRAR</a>
                                </th>
                                <!-- <th colspan="1"  class="text-center active"> <button type=""  onclick="Index(<?php echo $_SESSION['puesto'] ?>, <?php echo $aux ?>);" data-toggle="modal" data-target="#largeModal" class="btn btn-primary btn-lg m-l-15 waves-effect"><i class="material-icons">plus_one</i></button> </th>-->
                            </tr>
                            <tr>
                                <th colspan="3">
                                    CLIENTE:
                                    <?php echo strtoupper($puestos->administrador) ?>
                                    <small>Administrador</small>
                                </th>
                                <th colspan="1">
                                    <?php echo strtoupper($puestos->tipo.' '.$puestos->nombre) ?>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3">
                                    AUXILIAR:
                                    <?php echo strtoupper($_SESSION['full_name']) ?>
                                </th>
                                <th colspan="1">
                                    PUESTO: PORTERIA
                                    <?php //echo strtoupper($puestos->nombre) ?>
                                </th>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable js-exportable">
                            <thead>
                                <tr class="active">
                                    <th class="text-center" WIDTH="10%">Fecha</th>
                                    <th class="text-center" WIDTH="10%">Hora</th>
                                    <th class="text-center" WIDTH="40%">Asunto</th>
                                    <th class="text-center" WIDTH="40%">Observación</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-center" WIDTH="10%">Fecha</th>
                                    <th class="text-center" WIDTH="10%">Hora</th>
                                    <th class="text-center" WIDTH="40%">Asunto</th>
                                    <th class="text-center" WIDTH="40%">Observación</th>
                                </tr>
                            </tfoot>
                            <tbody>


                                <?php foreach ($this->model->Control_puesto() as $crdp): ?>
                                <tr>
                                    <td><?php echo $crdp->f_entrega ?></td>
                                    <td><?php echo $crdp->h_entrega ?></td>
                                    <td><?php echo strtoupper($crdp->tramite) ?></td>
                                    <td><?php echo $crdp->observacion ?></td>
                                    <!-- <td>
                                                <a onclick="Update(<?php echo $crdp->id ?>);" class="" data-toggle="modal"  data-target="#smallModal" ><i class="material-icons">edit</i></a>
                                                <a onclick="javascript:return confirm('Estás seguro que deseas eliminar el registro?')" href="?c=control_ingreso&a=Eliminar&id=<?php echo $inventario->id ?>"> <i class="material-icons">clear</i></a>
                                               </td>-->
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
