<?php sleep(1); //print_r($info) 
?>
<div class="timeline timeline-inverse">
    <!-- timeline time label -->
    <div class="time-label">
        <span class="bg-danger">
            <?php echo $info->fecha ?>
        </span>
    </div>
    <!-- /.timeline-label -->
    <!-- timeline item -->
    <div>
        <i class="fas fa-building bg-blue"></i></i>
        <div class="timeline-item">
            <span class="time"><i class="far fa-clock"></i> <?php echo $info->hora ?></span>
            <h3 class="timeline-header">INGRESO</h3>
            <div class="timeline-body">
                <ul>
                    <li>DESTINO:
                        <ul>
                            <li><?php echo $info->tipo . ' ' . $info->numero ?></li>
                        </ul>
                    </li>
                    <?php if ($info->tipo_vehiculo != "") : ?>
                        <li>VEHICULO:
                            <ul>
                                <li>Tipo: <?php echo $info->tipo_vehiculo ?></li>
                                <li>Placa: <?php echo $info->placa ?></li>
                                <li>Color: <?php echo $info->color ?></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
                <table class="table table-bordered table-sm">
                    <tr>
                        <th colspan='2'>Elementos Registrados <small>materiales-herramientas-etc</small></th>
                    </tr>
                    <tr>
                        <th style="width: 5%;">Item</th>
                        <th style="width: 5%;">Cantidad</th>
                        <th style="width: 5%;">Estado</th>
                    </tr>
                    <?php foreach ($tools as $tool) :   ?>
                        <tr>
                            <td style="width: 5%;"><?php echo $tool->item  ?></td>
                            <td style="width: 5%;"><?php echo $tool->cantidad  ?></td>
                            <td style="width: 5%;       "><?php
                                                            echo  $tool->estado == 0 ? 'Salio' : 'No Salio';
                                                            ?></td>
                        </tr>
                    <?php endforeach;   ?>
                </table>
            </div>
            <div class="timeline-footer">
                Registrado por:
                <strong><?php echo $info->funcionario ?></strong>
            </div>
        </div>
    </div>
    <!-- END timeline item -->
    <!-- timeline item -->
    <div>
        <i class="fas fa-user bg-info"></i>
        <div class="timeline-item">
            <span class="time"><i class="far fa-clock"></i></span>
            <h3 class="timeline-header border-0"><a href="#">Autorizado por:</a> <?php echo $info->habitante ?>
            </h3>
        </div>
    </div>
    <!-- END timeline item -->
    <!-- timeline item -->

    <!-- timeline time label -->
    <div class="time-label">
        <span class="bg-success">
            <?php echo $info->fecha_sal ?>
        </span>
    </div>
    <!-- /.timeline-label -->
    <!-- timeline item -->
    <div>
        <i class="fa fa-building bg-purple"></i>

        <div class="timeline-item">
            <span class="time"><i class="far fa-clock"></i> <?php echo $info->hora_sal ?></span>

            <h3 class="timeline-header">SALIDA</h3>

            <div class="timeline-body">

                <?php if ($info->tipo_vehiculo != ""  && $info->vehiculo_sal == 'si') : ?>
                    <li>SALIDA DEL VEHICULO:
                        <ul>
                            <li>Tipo: <?php echo $info->tipo_vehiculo ?></li>
                            <li>Placa: <?php echo $info->placa ?></li>
                            <li>Color: <?php echo $info->color ?></li>
                        </ul>
                    <?php endif; ?>

                    <?php if ($info->vehiculo_sal == 'no ingreso') : ?>
                        <h4>No hay registro del ingreso</h4>
                    <?php endif; ?>

                    <?php if ($info->vehiculo_sal == 'no') : ?>
                        <h4>No Sale el vehiculo</h4>
                    <?php endif; ?>

                    <label for="">Observación: </label><?php echo $info->observacion ?>

            </div>
            <div class="timeline-footer">
                Registrado por:
                <strong> <?php echo $info->user_sal ?></strong>
                <!-- <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>-->
            </div>
        </div>
    </div>
    <!-- END timeline item -->

</div>

</div>

</div>