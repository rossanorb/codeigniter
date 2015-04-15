function modal(width,height){
               
        $('body').prepend('<div id="mascara"></div>');
        
        var id = $('<div>')
                .attr("class","window")
                .attr("id","modal")
                .append('<a href="#" class="fechar">X Fechar</a>')
                .append( $('<div>').attr('id','conteudo_modal') )
        $('body').prepend(id);

        $('.fechar').bind('click', function(ev){
                ev.preventDefault();
                $('.window').remove();
                $('#mascara').remove();
        });
        
        $('#mascara').bind('click', function(ev){
                ev.preventDefault();
                $('.window').remove();
                $('#mascara').remove();
        });        

        if(width == null ){
            var width  = 300;
        }
 
        if(height == null){
            var height = 300;
        }
                
        id.css({'width' :  width+'px' ,'height' :  height+'px' });
        conteudo = id.find('#conteudo_modal')        
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