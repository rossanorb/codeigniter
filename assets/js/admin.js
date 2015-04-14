$(document).ready(function(){
    $('.glyphicon.editar').click(function () {
        var input = $(this).parent('li').find('input');
        console.log(input)
        input.addClass('editable');
        input.removeAttr('disabled');
    });

    $('.glyphicon.adicionar').click(function () {
        alert('adicionar');
                var id = $('.window#modal');
                console.log(id);

                var alturaTela = $(document).height();
                var larguraTela = $(window).width();

                //colocando o fundo preto
                $('#mascara').css({'width':larguraTela,'height':alturaTela});
                $('#mascara').fadeIn(1000); 
                $('#mascara').fadeTo("slow",0.8);

                var left = ($(window).width() /2) - ( $(id).width() / 2 );
                var top = ($(window).height() / 2) - ( $(id).height() / 2 );
                
                $(id).css({'top':top-200,'left':left});
                $(id).show();          
    });

    $('.glyphicon.excluir').click(function () {        
        console.log('exluir');
        var delelte = confirm(" \t\t\t\t\t\t\t\t Atenção ! \n\n Ao excluir todos os menus e respectivas fotografias associadas serão excluídos. \n Clique em OK para confirmar a exclusão ou  CANCELAR para cancelar a exclusão");
        var tipo = 0;
        if (delelte == true) {
            var input = $(this).parent('li').find('input');
            window.location.assign('/admin/delete/' + input.attr('id'))
//            var span = $(this).parent('li').find('span');
//            console.log(span);
//            if(span.hasClass('glyphicon glyphicon glyphicon-plus adicionar ') ){
//                tipo = 'menu'
//            }else{
//                tipo = 'categoria'
//            }
            
            
        }
    });


});