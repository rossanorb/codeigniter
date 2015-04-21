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
});

$(document).on('change', '.btn-file :file', function() {
    var input = $(this);
    var tmppath = URL.createObjectURL(input.get(0).files[0]);
    $("img#foto-upload").fadeIn("fast").attr('src',tmppath);
    $('#filename').attr('value',input.val().replace(/\\/g, '/').replace(/.*\//, ''));
});

