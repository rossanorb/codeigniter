<div class="container">

    <div class="container-fluid admin">

        <div class="row" id="menu">
            <div class="cols-sm-12">
                <div>
                    <ul class="nav nav-tabs">
                        <li role="presentation"><a href="/admin/">Menus</a></li>
                        <li role="presentation"><a href="/fotos/">Fotos</a></li>
                        <li class="active" role="presentation"><a href="/galeria/">Galeria</a></li>
                    </ul>
                </div>            
            </div>
        </div>

        <div class="row" id="painel">
                       
                <div class="col-sm-8">
                    <div class="row col-left">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="menu">menu:</label> 
                                        <select id="menu" name="menu" class="form-control">
                                            <option value="0">selecione</option>
                                            <?php if(isset($select_menu)): ?>
                                            <?php  foreach($select_menu as $row):?> 
                                            <option value="<?php echo $row->id_menu; ?>"><?php echo $row->nome; ?></option>
                                            <?php endforeach;?>
                                            <?php endif; ?>
                                        </select>                                    
                                        <div id="select_menu"><!-- conteúdo dinâmico --></div>                                        
                                    </div>                                    
                                </div>
                            </div>                                  
                        </div>
                        <div class="col-sm-12 btn-submit"><button class="btn btn-default" type="button" id="exibir_galeria">Exibir</button></div>
                    </div>                
                </div>
            
            <div class="col-sm-4"><!-- texto--></div>            
        </div>
        <div class="row">
            <div id="mensagem" class="cols-sm-12"></div>
        </div>
        <div class="row" id="painel_fotos" ></div>
    </div>
</div>