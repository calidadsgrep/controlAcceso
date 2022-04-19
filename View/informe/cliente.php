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
                    <?php foreach ($cliente as $cliente) :
                        $tipo = $this->model->Tipo_Inmueble($cliente->tipo_inmueble) ?>
                        <tr>
                            <td><?php echo $tipo->tipo . ' ' . $cliente->numero ?></td>
                            <td><?php echo ucwords($cliente->fullname) ?></td>
                            <td><a data-toggle="modal" data-target="#exampleModalLong" onclick="Habitantes('<?php echo $cliente->id ?>')">Ver</a></td>
                            <td><?php echo $cliente->telefono ?></td>
                            <td><?php echo empty($cliente->tipomasc) ? 'n/a' : $cliente->tipomasc;  ?></td>
                            <td><?php echo empty($cliente->cantidadmasc) ? 'n/a' : $cliente->cantidadmasc; ?></td>
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
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Información</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="habitantes">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
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

        function Habitantes(val) {
            $.ajax({
                type: "POST",
                url: '?c=informes&a=habitantes',
                data: 'inmu_id=' + val,
                success: function(resp) {
                    $('#habitantes').html(resp);
                    $('#respuesta').html("");
                }
            });
        }
    </script>