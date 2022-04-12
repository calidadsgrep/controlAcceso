<?php $habitantes=$this->model->Habitantes($_REQUEST['id']);
//print_r($habitantes);
?>                 
               <div class="form-group">
                   <label for="">Habitantes</label>
                    <select id='habitante' name="habitante" class="form-control" required>     
                      <option value="">Seleccionar</option>        
                      <?php foreach($habitantes as $infra):?>                        
                      <option value="<?php echo $infra->usuario_id ?>"><?php echo strtoupper($infra->nombres.' '.$infra->apellidos) ?></option>
                      <?php endforeach;?>
                    </select>                   
                   </div>