<form action="?c=minutas&a=guardar" method="POST" role="form">
    <legend>Registrar Item</legend>
<div class="row clearfix">
<div class="col-md-4">
    <div class="form-group">
    <div class="form-line">
        <label for="">Cantidad</label>
        <input type="hidden"  name="puesto_id"  class="form-control" id="" value="<?php echo $_POST["puesto_id"] ?>">
        <input type="number"  name="cantidad"  class="form-control" id=""  min="1"  required>
        </div>
    </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
          <div class="form-line">
            <label for="">Item</label>
            <input type="text"  name="item" class="form-control" id="" placeholder="" required>
          </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
        <div class="form-line">
            <label for="">Estado</label>
            <input type="text" name="estado"  class="form-control" id="" placeholder="" required>
        </div>
        </div>
    </div>
</div>



    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
