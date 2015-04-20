<select id="menu" name="tipo" class="form-control">
    <option value="0">selecione</option>
    <?php    
    foreach($lista_menu as $row):
    ?> 
        <option value="<?php echo $row->id_menu; ?>"><?php echo $row->nome; ?></option>
    <?php
    endforeach;
    ?>
</select>