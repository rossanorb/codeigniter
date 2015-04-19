<div class="col-sm-12">
    
    <div class="row">
        <label for="categoria">Categorias:</label>
        
        <div class="cols-xs-12">
            <div class="form-inline">
                <label for="nome">nome:</label>
                <input type="text" placeholder="Nome da categoria" id="txt_nome_categoria" name="txt_nome_categoria" class="form-control"  size="60" maxlength="50" >                
                <button class="btn btn-default" id="bt_categoria" type="submit">Adicionar</button>            
            </div>    
            
        </div>
        
        <div class="cols-xs-12" id="painel">
            <div class="list-group">
                <ul class="list-group categoria">
                    <?php if(isset($query) && sizeof($query) > 0 ):
                            foreach ($query as $categoria):
                    ?>                              
                    <li class="list-group-item">
                    <?php
                        $data = array(
                                       'name'        => "categoria",
                                       'id'          => $categoria->id_categoria,
                                       'value'       => $categoria->nome,
                                       'disabled'    => 'disabled',
                                       'class'       =>'menu_name',
                                       'maxlength'   => '50',
                                       'size'        => '60',
                                       'menu'        => $categoria->id_menu
                         );                                
                        echo form_input($data);
                    ?> 
                    <span class="glyphicon glyphicon-trash excluir_categoria "> </span>
                    <span class="glyphicon glyphicon glyphicon-pencil editar_categoria"> </span>
                    </li>
                    <?php
                            endforeach;
                        else:
                    ?>                    
                        <li class="list-group-item">                    
                            <p>Nenhuma categoria cadastrada ainda</p>
                        </li>                        
                    <?php endif; ?>                    
                </ul>
                <button id="editar_categoria" type="button" class="btn btn-default">Salvar Alterações</button>
            </div>            
        </div>
    </div>

</div>

