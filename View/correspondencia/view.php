<?php
/*print_r($corres);
    echo'<pre>';
    print_r($residentes);
    echo'</pre>';*/
?>

<div class="card">
    <div class="header"></div>
    <div class="body">
        <div class="row">
            <div class="col-sm-6">
                <ul>
                    <li>LLEGADA DE CORRESPONDENCIA
                        <ul>
                            <li><span>Llegada: </span><?php echo $corres->fecha_llegada; ?></li>
                            <li><span>Guarda que recibio: </span><?php echo $corres->guarda_recibe; ?></li>
                            <li><span>Tipo Correspondencia: </span><?php echo $corres->tipo_correspondencia; ?></li>
                            <li><span>Destino: </span><?php echo $corres->tipo . ' ' . $corres->numero; ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <ul>
                    <li>ENTREGA DE CORRESPONDENCIA
                        <ul>
                            <li><span>Entregado: </span><?php echo $corres->fecha_entrega; ?></li>
                            <li><span>Entregado Por: </span><?php echo $corres->guarda_entrega; ?></li>
                            <li><span>Entregado A: </span>
                                <?php
                                foreach ($residentes as $residente) :
                                    echo $residente->usuario_id == $corres->residente_recibe ? strtoupper($residente->fullName) : '';
                                endforeach;
                                ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>