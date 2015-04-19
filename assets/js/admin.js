function getContentModal(data){
        console.log('getContentModal');
        $('#content-modal').html(data['gerencia_categoria']);
        
        $('#editar_categoria').bind('click',function(){            
            var categorias = new Array();
            $('ul.list-group.categoria input').each(function(i){
                if( $(this).hasClass('menu_name editable')){
                    var objeto = {id_categoria : $(this).attr('id'), 'nome' : $(this).val()};
                    console.log(objeto);
                    categorias.push(objeto);
                }
            });            
            //console.log( JSON.stringify(ocat)  );
            request(
                data,
                null,
                JSON.stringify(categorias),
                '/admin/edita_categoria/'
            );
        });

        $('#bt_categoria').bind('click',function(){
            //console.log(data['query'][0]['id_menu']);
            request(data,null,null,'/admin/add_categoria/');
        });

        $('.editar_categoria').bind('click',function(){
            var input = $(this).parent('li').find('input');
            //console.log(input.attr('id'));
            input.addClass('editable');
            input.removeAttr('disabled');            
        });

        $('.excluir_categoria').bind('click',function(){
            console.log('excluir',data['id']);
            console.log('excluir',$(this).parent('li').find('input').attr('id'));
            var del = confirm(" \t\t\t\t\t\t\t\t Atenção ! \n\n Ao excluir essa categoria todas as fotos associadas serão excluídas. \n Clique em OK para confirmar a exclusão ou  CANCELAR para cancelar a exclusão");
            if (del == true) {
                request(
                    data,
                    $(this).parent('li').find('input').attr('id'),
                    null,
                    '/admin/delete_categoria/'
                );
            }
        });    
}

function request(data,id_categoria,categorias,url){
//function request(data,categorias,url){
        $.ajax({
            dataType : 'json',
            type     : 'post',
            url:  url,
            data     : {
                id  : data['id'],
                id_categoria : id_categoria,
                nome: $('#txt_nome_categoria').val(),
                categorias:categorias
            },
            success : function(data){
                getContentModal(data);
            }
        });    
}

$(document).ready(function(){
    $('.glyphicon.editar_menu').click(function () {
        console.log('editar_menu');
        var input = $(this).parent('li').find('input');
        console.log(input)
        input.addClass('editable');
        input.removeAttr('disabled');
    });

    $('.glyphicon.adicionar_menu').click(function () {
        console.log('adicionar menu');
        id = $(this).parent('li').find('input').attr('id');
        
        modal($('#gerenciar-categoria'),966,600);
        
        $.ajax({
            dataType : 'json',
            type : 'post',
            url :  '/admin/categoria/',
            data : {
                id : id
            },
            success : function(data){
                getContentModal(data);
            }
        });
        
    });

    $('.glyphicon.excluir_menu').click(function () {
        console.log('exluir menu');
        var del = confirm(" \t\t\t\t\t\t\t\t Atenção ! \n\n Ao excluir todos os menus e respectivas fotografias associadas serão excluídos. \n Clique em OK para confirmar a exclusão ou  CANCELAR para cancelar a exclusão");
        var tipo = 0;
        if (del == true) {
            var input = $(this).parent('li').find('input');
            window.location.assign('/admin/delete/' + input.attr('id'))            
        }
    });
    

    
    
});

