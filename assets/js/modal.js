function modal(obj,width,height){
    
        $('body').prepend('<div id="mascara"></div>');
        $('#mascara').bind('click', function(ev){
            ev.preventDefault();
            $('.window').hide();
            $('#mascara').remove();
        });         

        if($('div#modal.window').length > 0){
            var id = $('div#modal.window');
        }else{
            var id = $('<div>')
                    .attr("class","window")
                    .attr("id","modal")
                    .append('<a href="#" class="fechar">X Fechar</a>')
                    .append( $('<div>').attr('id','container-modal') )
            $('body').prepend(id);

            obj_clonado = obj.clone();
            obj_clonado.appendTo('#container-modal');
            obj_clonado.show();
            obj_clonado.attr('id','content-modal');
            obj.remove();

            $('.fechar').bind('click', function(ev){
                    ev.preventDefault();
                    $('.window').hide();
                    $('#mascara').remove();
            });
        }

        if(width == null ){
            var width  = 300;
        }

        if(height == null){
            var height = 300;
        }

        id.css({'width' :  width+'px' ,'height' :  height+'px' });
        conteudo = id.find('#container-modal')        
        conteudo.css({'overflow' : 'scroll'});
        conteudo.css({'width' : width - 50 +'px' });
        conteudo.css({'height' : height - 50 + 'px' });
        conteudo.css({'margin' : 'auto' });

        var alturaTela = $(document).height();
        var larguraTela =$(window).width();

        //colocando o fundo preto
        $('#mascara').css({'width':larguraTela,'height':alturaTela});
        $('#mascara').fadeIn(1000); 
        $('#mascara').fadeTo("slow",0.8);

        var left = ($(window).width() /2) - ( $(id).width() / 2 );
        var top = ($(window).height() / 2) - ( $(id).height() / 2 );

        $(id).css({'top':top-100,'left':left});

        $(id).show();   
        
}