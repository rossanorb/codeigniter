<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Alt artes</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="icon" href="<?php echo base_url().IMAGENS.'favicon.ico' ?> ">        

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url().FONTAWESOME.'font-awesome.css'?>" type="text/css">
        <?php
       //plugins css        
        if(isset($plugins['css']) && sizeof($plugins['css']) > 0 ):
            foreach ($plugins['css'] as  $plugins_css ) echo " $plugins_css \n ";
        endif;
        ?>       
        <link href="<?php echo base_url().CSS.'alt_artes.css'?>" rel="stylesheet" type="text/css">        
        <?php
        //css por página
        if(isset($css) && sizeof($css) > 0 ):
            foreach ($css as  $c )  echo "$c \n ";            
        endif;
        ?>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>        
        <?php
       //plugins  javascript      
        if(isset($plugins['js']) && sizeof($plugins['js']) > 0 ):
            foreach ($plugins['js'] as  $plugins_js ) echo " $plugins_js \n ";
        endif;
        ?>        
        
        <?php // javascripts por página        
        if( isset($javascripts) && sizeof($javascripts)>0 ):
                foreach ($javascripts as $js ):?>         
        <script type="text/javascript" src="<?php echo base_url(). $js ?>"></script>
        <?php   endforeach;    
        endif;
        ?>        

    </head>
    <body>
        <div class="container">
            <?php echo empty($header)? NULL: $header; ?>
            <?php echo $body ?>
            <?php echo empty($footer)? NULL:$footer; ?>
        </div>    
    </body>
</html>