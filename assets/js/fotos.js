$(document).ready(function(){
    
    $('.form-control#menu').on("change", function(e){
        if( $(this).val() > 0){
                $.ajax({
                    dataType : 'json',
                    type     : 'post',
                    url:  '/fotos/categoria/',
                    data     : {
                        id  : $(this).val()
                    },
                    success : function(data){                          
                          var nro_options = $(data['select']).find('option').length;                          
                          if(nro_options > 1){
                                $('#select_menu').html(data['select']);                                
                          }else{
                                $('#select_menu select').remove();
                                $('#select_menu label').remove();
                          }                          
                          
                    }
                });            
        }else{
             $('#select_menu select').remove();
             $('#select_menu label').remove();
        }
        
    });
    
    $('.excluir_fotografia').on('click',function(){
        var id_fotografias = $(this).attr('id');
        var id_menu = $('select#menu option:selected').val();        
        $(window.document.location).attr('href','/fotos/delete_fotografia/'+id_fotografias+'/'+id_menu);
    });
    
    $('#exibir_galeria').on('click',function(){
        var id_menu = $('select#menu option:selected').val();
        var id_categoria = $('select#categoria option:selected').val();
                
        if(id_categoria == null){
            id_categoria = 0;
        }

        if(id_menu > 0){
            $(window.document.location).attr('href','/fotos/exibir_galeria/'+id_menu+'/'+id_categoria);
        }else{
            alert('Selecione o menu');
        }
            
       

    });
    
});

$(document).on('change', '.btn-file :file', function() {
    var input = $(this);
    var tmppath = URL.createObjectURL(input.get(0).files[0]);
    $("img#foto-upload").fadeIn("fast").attr('src',tmppath);
    $('#filename').attr('value',input.val().replace(/\\/g, '/').replace(/.*\//, ''));
});

