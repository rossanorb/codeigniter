function excluir_foto_galeria(){
    var id_fotografias = $(this).attr('id');    
       $.ajax({
            dataType : 'json',
            type : 'post',
            url: '/galeria/delete_fotografia/',
            data :{
               id_fotografias: id_fotografias               
            },
            success : function(data){
                  if(data.status == true)
                      alert('Foto excluída com sucesso!')
                  else
                      alert('Erro ao excluir foto!')
                  
                  if(data.status){
                      exibir_galeria();
                  }
            }            

       });     
}

//$('.excluir_fotografia').on('click',function(){
//    var id_fotografias = $(this).attr('id');        
//    console.log(id_fotografias);
//    $(window.document.location).attr('href','/galeria/delete_fotografia/'+id_fotografias);
//});

function exibir_galeria(){
       // console.log($('select#menu option:selected').val());
       // console.log($('select#categoria option:selected').val());

        var id_menu = $('select#menu option:selected').val();

        if( $('select#categoria option:selected').val() == 'undefined'){
            var id_categoria = 0;
        }else{
            var id_categoria = $('select#categoria option:selected').val();
        }

       $.ajax({
            dataType : 'json',
            type : 'post',
            url: '/galeria/show/',
            data :{
               id_menu: id_menu,
               id_categoria: id_categoria
            },
            success : function(data){
                  $('#painel_fotos').html(data.gallery);

            }            

       });    
}

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
    
    
    $('#exibir_galeria').click(function(){
        exibir_galeria();
    });  
 
    
});



