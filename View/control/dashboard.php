<section class="content text-center">
      <div class="container-fluid">
        
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">:-:CONTROL DE ACCESO:-:</h3>
              </div>
                <div class="card-body">
          <div class="row">
          <!-- left column -->
          <div class="col-md-4">
                <label>BUSCAR</label>        
                <div class="input-group mb-3">
                  <input type="text" id="fname" name="fname" class="form-control" onkeyup="Buscar()">                  
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                  </div>
                </div>
          </div>
          <!-- de column -->
          <div class="col-md-8" id="resultados"></div>
          </div>
        </div>
      </div>
</section>
<script>
function Buscar() {
    var x = document.getElementById("fname").value;
    document.getElementById("resultados").innerHTML = x;
}
 
$(document).ready(function() {
    $("#fname").focus();
    $("#fname").keyup(function() {
        var parametros = "fname=" + $(this).val();
        $.ajax({
            data: parametros,
            url: '?c=Accesopersonas&a=personas',
            type: 'post',
            beforeSend: function() {
                //$("#salida").html("<p align='center'></p>");
                $("#resultados").html(                
                    '<div class="loading"><img src="View/img/gifs/cargando-loading-009.gif" alt="loading" width="25" height="25" />&nbsp;&nbsp; <br>...Buscando...<br>por favor espere...</div>'
                );
            },
            success: function(response) {
                $("#resultados").html(response);
            },
            error: function() {
                alert("error")
            }
        });
    })
});
</script>
