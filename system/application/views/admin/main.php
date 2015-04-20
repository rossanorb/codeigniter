<div class="container-fluid admin">
    <div class="row"  id="menu">
        <div class="cols-xs-12">
            <div>
                <ul class="nav nav-tabs">
                    <li class="active" role="presentation"><a href="/admin/">Menus</a></li>
                    <li role="presentation"><a href="/fotos/">Fotos</a></li>
                </ul>
            </div>            
        </div>
    </div>
    <div class="row"  id="painel" >
        <div class="col-sm-4">
             <?php echo form_open('admin/',array('name'=>'add_menu')); ?>                
                    <div class="form-group">                
                        <label  for="menu">tipo:</label>                        
                        <select id="menu" name="tipo" class="form-control">
                                <option value="0">selecione</option>
                            <?php foreach($select as $row): ?>
                                <option value="<?php echo $row->id_tipo; ?>"><?php echo $row->nome; ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>            
                    <div class="form-group">
                        <label for="nome">nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do menu ou categoria">
                    </div>
                    <button type="submit" class="btn btn-default">Adicionar</button>
                </form>
        </div>
        <div class="col-sm-8" ><label for="menus_categoria">Menus/Categorias:</label>
            <div class="list-group">                
                 <?php echo form_open('admin/',array('name'=>'edit_menu')); ?>  
                    <ul class="list-group">
                        <?php if(isset($lista_menu) && sizeof($lista_menu) > 0 ):                            
                                foreach ($lista_menu as $menu):
                        ?>          
                                        <li class="list-group-item">
                                            <?php
                                                $data = array(
                                                               'name'        => "edit[{$menu->id_menu}]",
                                                               'id'          => $menu->id_menu,
                                                               'value'       => $menu->nome,
                                                               'disabled'    => 'disabled',
                                                               'class'       =>'menu_name',
                                                               'maxlength'   => '50',
                                                               'size'        => '60',
                                                 );                                
                                                echo form_input($data);
                                            ?>
                                            <span class="glyphicon glyphicon-trash excluir_menu "> </span>
                                            <span class="glyphicon glyphicon glyphicon-pencil editar_menu"> </span>                                            
                                            <?php if($menu->id_tipo == 2):?>
                                            <span class="glyphicon glyphicon glyphicon-plus adicionar_menu "> </span>
                                            <?php endif ;?>                                            
                                        </li>
                        <?php
                                endforeach;
                            else:
                        ?>
                                        <li class="list-group-item">                    
                                            <p>Nenhum menu cadastrado.</p>
                                        </li>                        
                      <?php endif; ?>
                    </ul>
                <button class="btn btn-default" type="submit">Salvar Altera&ccedil;&otilde;es</button>
                </form>
            </div>
        </div>
    </div>       
</div>


<div id="gerenciar-categoria" class="row" style="display: block;" >
</div>