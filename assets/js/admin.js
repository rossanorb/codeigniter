$(document).ready(function(){       
    $('.glyphicon.editar').click(function () {
        var input = $(this).parent('li').find('input');
        console.log(input)
        input.addClass('editable');
        input.removeAttr('disabled');
    });

    $('.glyphicon.adicionar').click(function () {
        console.log('adicionar');
       // modal($('.window#modal'),966,600);
        modal(966,600);
    });

    $('.glyphicon.excluir').click(function () {
        console.log('exluir');
        var del = confirm(" \t\t\t\t\t\t\t\t Atenção ! \n\n Ao excluir todos os menus e respectivas fotografias associadas serão excluídos. \n Clique em OK para confirmar a exclusão ou  CANCELAR para cancelar a exclusão");
        var tipo = 0;
        if (del == true) {
            var input = $(this).parent('li').find('input');
            window.location.assign('/admin/delete/' + input.attr('id'))            
        }
    });
});

