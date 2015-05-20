<?php 
//echo @$id_menu;
//echo '<br>';
//echo @$id_categoria;
//echo '<br>';
//echo @$tipo;

?>

<div class="container">

    <div class="container-fluid admin">

        <div id="menu" class="row">
            <div class="cols-sm-12">
                <div>
                    <ul class="nav nav-tabs">
                        <li role="presentation"><a href="/admin/">Menus</a></li>
                        <li role="presentation" class="active"><a href="/fotos/">Fotos</a></li>
                        <!-- <li role="presentation"><a href="/galeria/">Galeria</a></li> -->
                    </ul>
                </div>            
            </div>
        </div>

        <div id="painel" class="row">            
            <div class="col-sm-8">
                <?php echo form_open_multipart('fotos/upload'); ?>
                <div class="row col-left">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="menu">menu:</label> 
                                    <select id="menu" name="menu" class="form-control">
                                        <?php if(!isset($id_menu)):  ?>
                                            <option value="0">selecione</option>
                                         <?php endif; ?>   
                                        
                                         <?php  foreach($select_menu as $row):?> 
                                                <?php  if($row->id_menu == $id_menu):  ?>
                                                    <option value="<?php echo $row->id_menu; ?>"><?php echo $row->nome; ?></option>
                                                 <?php endif;  ?>     
                                        <?php endforeach;?>    
                                            
                                         <?php  foreach($select_menu as $row):?> 
                                                <?php  if($row->id_menu == $id_menu): continue; else: ?>
                                                    <option value="<?php echo $row->id_menu; ?>"><?php echo $row->nome; ?></option>
                                                 <?php endif;  ?>     
                                        <?php endforeach;?>  
                                    </select>
                                    
                                    <div id="select_menu">
                                        <?php echo @$select_categoria; ?>
                                    </div>
                                </div>                                    
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6" >
                                Somente extensões jpg e jpeg <br>
                                Tamanho 966w x 648h
                            </div>

                        </div>                    
                    </div>
                    <div class="col-sm-12">                        
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-primary btn-file">                                        
                                        Browse… <input type="file"  size="20" name="userfile" >
                                    </span>
                                </span>
                                <input type="text" class="form-control" id="filename"  disabled="">
                            </div>
                            
                    </div>
                    <div class="col-sm-12 btn-submit">
                        <div class="form-group">
                        <button type="submit" class="btn btn-default">Upload</button>                        
                        </div>
                    </div>
                </div>                
                </form>
            </div>            
            <div class="col-sm-4">
                <img src="" id="foto-upload" width="200" style="display:none;" />                
            </div>            
        </div>
        <div class="row" >            
            <div class="cols-sm-12" id="mensagem" >
                <?php
                if( isset($retorno['error']) ):
                    $erro = strip_tags($retorno['error']);
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $erro; ?>
                </div>
                <?php
                endif;
                ?>
                
                <?php
                if( isset($retorno['msg']) ):
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $retorno['msg']; ?>
                </div>
                <?php
                endif;
                ?>
                
            </div>
             <div class="col-sm-12 btn-submit">
                 <div class="input-group">
                <?php echo form_open('fotos/exibir_galeria'); ?>
                     <button type="button" id="exibir_galeria" class="btn btn-default">Exibir Galeria</button>
                 </form>
                </div>
            </div>
        </div>
        <div class="row" id="painel_fotos" >
            
                <?php
                if(isset($gallery)){
                    echo $gallery;
                }
                ?>
                      
            
        </div>
    </div>
</div>