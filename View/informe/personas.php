    <?php
    sleep(1);
    /*echo '<pre>';
    print_r($persona);
    echo '</pre>';*/
    ?>
 <div class="card">
     <div class="card-header">
     </div>
     <div class="card-body">
         <table id="example1" class="table table-bordered">
             <thead>
                 <tr class="active">
                     <th colspan="4" class="bg-red">Entrada</th>
                     <th colspan="5" class="bg-green">Salida</th>
                 </tr>
                 <tr>
                     <th>Persona</th>
                     <th>Destino</th>
                     <th>Registro</th>
                     <th>Vehiculo</th>
                     <th>Registro</th>
                     <th>Vehiculo</th>
                     <th>Material/herramienta/etc</th>
                     <th>Observación</th>
                 </tr>
             </thead>
             <tbody>
                 <?php foreach ($persona as $personas) :
                        $tipo = $this->model->Tipo_Inmueble($personas->tipo_inmueble)
                    ?>
                     <tr>
                         <td><?php echo strtoupper($personas->nombres . ' ' . $personas->apellidos. '<br><small>' . $personas->num_identificacion). '<small>' ?></td>
                         <td><?php echo $tipo->tipo . ' ' . $personas->numero ?></td>
                         <td><?php echo $personas->fecha . ' ' . $personas->hora ?></td>
                         <td><?php echo $personas->tipo_vehiculo . ' ' . $personas->placa . ' ' . $personas->color ?></td>
                         <td><?php echo $personas->fecha_sal . ' ' . $personas->hora_sal ?></td>
                         <td><?php echo strtoupper($personas->vehiculo_sal) ?></td>
                         <td><?php echo strtoupper($personas->objetos_sal) ?></td>
                         <td><?php echo $personas->observacion ?></td>
                     </tr>
                 <?php endforeach; ?>
             </tbody>
             <tfoot>
                 <tr>
                     <th>Destino</th>
                     <th>Persona</th>
                     <th>Ingreso</th>
                     <th>Vehiculo</th>
                     <th>Salida</th>
                     <th>Vehiculo</th>
                     <th>Material/herramienta/etc</th>
                     <th>Observación</th>
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
