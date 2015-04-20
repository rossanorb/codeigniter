<label for="menu">categoria:</label>
<select class="form-control" name="categoria" id="categoria">
    <option value="0">selecione</option>
<?php
foreach ($query as $row):
    if($row->id_tipo == 2):
?>
     <option value="<?php echo $row->id_categoria; ?>"><?php echo $row->nome; ?></option>
<?php
    endif;
endforeach;
?>
</select>

