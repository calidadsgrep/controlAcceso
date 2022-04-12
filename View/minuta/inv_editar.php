<?php $_REQUEST['item_id'];?>
<form action="?c=minutas&a=Guardar" method="POST" role="form">
    <legend>Actualizar Item</legend>
<div class="row clearfix">
<div class="col-md-4">
    <div class="form-group">
    <div class="form-line">
        <label for="">Cantidad</label>
        <input type="hidden"  name="id" value="<?php echo $alm->id; ?>" class="form-control" id="" value="<?php echo $_POST["id"] ?>">
        <input type="hidden"  name="puesto_id" value="<?php echo $alm->puesto_id; ?>" class="form-control" id="" value="<?php echo $_POST["puesto_id"] ?>">
        <input type="hidden"  name="actualizacion"  class="form-control" id="" value="<?php echo date('Y-m-d') ?>">
        <input type="number"  name="cantidad"  value="<?php echo $alm->cantidad; ?>" class="form-control" id=""  min="1"  required>
        </div>
    </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
          <div class="form-line">
            <label for="">Item</label>
            <input type="text"  name="item" value="<?php echo $alm->item; ?>" class="form-control" id="" placeholder="" required>
          </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
        <div class="form-line">
            <label for="">Estado</label>
            <input type="text" name="estado" value="<?php echo $alm->estado; ?>" class="form-control" id="" placeholder="" required>
        </div>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <div class="form-group">
        <div class="form-line">
            <label for="">Novedad</label>
            <textarea type="text" name="novedad" value="<?php echo $alm->novedad; ?>" class="form-control" id="" placeholder="" required> <?php echo $alm->novedad; ?> </textarea>
        </div>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Actualizar</button>
</form>