<div class="container-fluid admin">
    <div class="row"  id="menu">
        <div class="cols-xs-12">
            <div>
                <ul class="nav nav-tabs">
                    <li class="active" role="presentation"><a href="#">Menus</a></li>
                    <li role="presentation"><a href="#">Upload</a></li>
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
                            <option value="1">categoria</option>
                            <option value="2">menu</option>
                        </select>
                    </div>            
                    <div class="form-group">
                        <label for="nome">nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do menu ou categoria">
                    </div>
                    <button type="submit" class="btn btn-default">Adicionar</button>
                </form>
        </div>
        <div class="col-sm-8" >
            <div class="list-group">                
                 <?php echo form_open('admin/',array('name'=>'edit_menu')); ?>  
                    <ul class="list-group">                        
                        <li class="list-group-item">
                            <input type="text" value="home" name="edit[1]" class="menu_name " disabled="disabled" id="1">        
                            <span class="glyphicon glyphicon glyphicon-pencil editar "> </span>
                            <span class="glyphicon glyphicon-trash excluir "> </span>
                        </li>

                        <li class="list-group-item">
                            <input type="text" value="autoral" name="edit[2]" class="menu_name " disabled="disabled" id="2">
                            <span class="glyphicon glyphicon glyphicon-plus adicionar "> </span>
                            <span class="glyphicon glyphicon glyphicon-pencil editar "> </span>
                            <span class="glyphicon glyphicon-trash excluir "> </span>
                        </li>

                        <li class="list-group-item">
                            <input type="text" value="in(studio)" name="edit[3]" class="menu_name " disabled="disabled" id="3">
                            <span class="glyphicon glyphicon glyphicon-plus adicionar "> </span>
                            <span class="glyphicon glyphicon glyphicon-pencil editar "> </span>
                            <span class="glyphicon glyphicon-trash excluir "> </span>
                        </li>  

                        <li class="list-group-item">                    
                            <input type="text" value="artes" name="edit[4]" class="menu_name " disabled="disabled" id="4">
                            <span class="glyphicon glyphicon glyphicon-plus adicionar "> </span>
                            <span class="glyphicon glyphicon glyphicon-pencil editar "> </span>
                            <span class="glyphicon glyphicon-trash excluir "> </span>                    
                        </li>
                    </ul>
                    <button class="btn btn-default" type="submit">Salvar Alterações</button>
                </form>
            </div>
        </div>
    </div>       
</div>
<script>
    $('.glyphicon.editar').click(function () {
        var input = $(this).parent('li').find('input');
        console.log(input)

        input.addClass('editable');
        input.removeAttr('disabled');
    });

    $('.glyphicon.adicionar').click(function () {
        alert('adicionar');
    });

    $('.glyphicon.excluir').click(function () {
        alert('excluir');
    });


</script> 
<?php
    if(isset($_POST['edit'])){
        foreach ($_POST['edit'] as $id => $name)
            echo "$id - $name <br>";
    }
?>