<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">CENSIG</h1> <small>::Panel de Control::</small>
  </div>
</div><!-- /.row -->
<?php
//echo "<pre>";
//print_r($ip);
$cant_ing = count($ip);
$cant_inmueble = count($inmuebles);
$cant_corr = count($cor);
//echo "</pre>";
?>
<!-- /.content-header -->
<div class="row">
  <div class="col-lg-4 col-6">
    <!-- small card -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?php echo $cant_ing ?></h3>
        <p>Personas Registro Diario</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="#" class="small-box-footer" onclick="Personal()" >
        Más info <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <!-- ./col -->
  <div class="col-lg-4 col-6">
    <!-- small card -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?php echo  $cant_inmueble ?></h3>
        <p>Inmuebles de Registrados</p>
      </div>
      <div class="icon">
        <i class="fas fa-building"></i>
      </div>
      <a href="#" class="small-box-footer" onclick="Clientes()">
        Más info <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-4 col-6">
    <!-- small card -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?php echo  $cant_corr ?></h3>
        <p> Correspondencia Sin Entregar</p>
      </div>
      <div class="icon">
        <i class="fas fa-envelope"></i>
      </div>
      <a href="#" onclick="Correspondencia()" class="small-box-footer">
        Más info <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-12 col-1 text-center" id="info"></div>
</div>

<script>
  function Personal() {
    $('#info').html("<h5>Cargando Complementos</h5>");
    $.ajax({
      type: "POST",
      url: '?c=informes&a=personas',
      // data: 'solicitante=' + val,
      success: function(resp) {
        $('#info').html(resp);
        $('#respuesta').html("");
      }
    });
  }
  function Clientes() {
    $('#info').html("<h5>Cargando Complementos</h5>");
    $.ajax({
      type: "POST",
      url: '?c=informes&a=clientes',
      // data: 'solicitante=' + val,
      success: function(resp) {
        $('#info').html(resp);
        $('#respuesta').html("");
      }
    });
  }
  function Correspondencia() {
    $('#info').html("<h5>Cargando Complementos</h5>");
    $.ajax({
      type: "POST",
      url: '?c=informes&a=correspondencia',
      // data: 'solicitante=' + val,
      success: function(resp) {
        $('#info').html(resp);
        $('#respuesta').html("");
      }
    });
  }
  



</script>