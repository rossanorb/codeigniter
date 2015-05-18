<?php
if(isset($query)){
    foreach ($query as $row ){
        if($row->tipo == 2 ){
            //menu - pega nome da categoria do menu
            $nome = $row->nome_categoria;
        }else{
            //categoria - pega nome do  menu
            $nome = $row->menu_nome;         
        }
    }
}
?>

<div class="cols-sm-12">
    <div class="page-header">
      <h1><?php echo isset($nome) ?  $nome : NULL ;?></h1>
    </div>
</div>
<div class="cols-sm-12">
    <ul class="row">
    <?php if(isset($query)): ?>    
    <?php 
    foreach ($query as $row ):
        if( isset($row->src)):
    ?>
        <li class="col-sm-3">
            <span class="glyphicon glyphicon-trash excluir_fotografia" id="<?php echo $row->id_fotografia; ?>"> </span>        
            <img class="img-responsive" name="<?php echo $row->fotografia_nome; ?>" src="<?php echo base_url(). FOTOS.$row->src; ?>">
        </li>
    <?php
        endif;
    endforeach;
    ?>
    <?php endif; ?>     
    </ul>
</div>    
    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">         
            <div class="modal-body">                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>    
     $('.excluir_fotografia').on('click', excluir_foto_galeria);
</script>    