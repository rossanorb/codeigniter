<label for="menu">categoria:</label>
<select class="form-control" name="categoria" id="categoria">
    
    <?php if($id_categoria == 0 ): ?>
        <option value="0">selecione</option>
    <?php endif; ?>
    
    <?php foreach ($query as $row): ?>
    <?php if($row->id_categoria == $id_categoria && $row->id_tipo == 2): ?>
         <option value="<?php echo $row->id_categoria; ?>"><?php echo $row->nome; ?></option>
     <?php endif;?>
    <?php endforeach; ?>

    <?php foreach ($query as $row): ?>
    <?php if($row->id_categoria == $id_categoria && $row->id_tipo == 2): continue;  else: ?>
          <?php if($row->id_tipo == 2):?>         
                    <option value="<?php echo $row->id_categoria; ?>"><?php echo $row->nome; ?></option>
         <?php endif;?>
     <?php endif;?>
    <?php endforeach; ?>         
         
         
</select>

