function adicionar_categoria(data){
        $.ajax({
            dataType : 'json',
            type 	 : 'post',
            url:  '/admin/add_categoria/',
            data     : {
                id  : data['id'],
                nome: $('#txt_nome_categoria').val()
            },
            success : function(data){
                $('#content-modal').html(data['gerencia_categoria']);
                                
                $('#bt_categoria').bind('click',function(){
                    adicionar_categoria(data);                    
                });
                                
                $('.editar_categoria').bind('click',function(){
                    //editar_categoria();
                });
                
                $('.excluir_categoria').bind('click',function(){
                    id_menu = data['id'];
                    //exluir_categoria();
                });
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
                $('#content-modal').html(data['gerencia_categoria']);
                                
                $('#bt_categoria').bind('click',function(){
                    adicionar_categoria(data);                    
                });
                                
                $('.editar_categoria').bind('click',function(){
                    //editar_categoria();
                });
                
                $('.excluir_categoria').bind('click',function(){
                    id_menu = data['id'];
                    //exluir_categoria();
                });
                
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

