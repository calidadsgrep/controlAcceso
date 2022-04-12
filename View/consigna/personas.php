                <label for="">Dirigido A:</label>
                <select name="dirigido_a" id="dirigido_a" class="form-control select2bs4">
                     <option value="">Seleccionar</option>
                     <?php foreach ($personas as $persona) : ?>
                         <option value="<?php echo $persona->id ?>"><?php echo  $persona->fullname ?></option>
                     <?php endforeach; ?>
                 </select>