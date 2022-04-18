    <?php
    sleep(1);
  /* echo '<pre>';
    print_r($cliente);
    echo '</pre>';*/
    ?>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr class="bg-yellow">
                        <th>Imnueble</th>
                        <th>Responsable</th>
                        <th>Residentes</th>
                        <th>Telefono</th>
                        <th>Mascotas</th>
                        <th>Cantidad</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cliente as $cliente) :
                        $tipo = $this->model->Tipo_Inmueble($cliente->tipo_inmueble) ?>
                        <tr>
                            <td><?php echo $tipo->tipo . ' ' . $cliente->numero ?></td>
                            <td><?php echo ucwords($cliente->fullname) ?></td>
                            <td>Ver</td>
                            <td><?php echo $cliente->telefono ?></td>
                            <td><?php echo empty($cliente->tipomasc) ? 'n/a' : $cliente->tipomasc ;  ?></td>
                            <td><?php echo empty($cliente->cantidadmasc) ? 'n/a' : $cliente->cantidadmasc ;?></td>                           
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr class="bg-yellow">
                        <th>Imnueble</th>
                        <th>Responsable</th>
                        <th>Residentes</th>
                        <th>Telefono</th>
                        <th>Mascotas</th>
                        <th>Cantidad</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>