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
        <link href="<?php echo base_url().CSS.'alt_artes.css'?>" rel="stylesheet" type="text/css">
        <?php echo empty($css)? NULL: $css; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container">
            <?php echo empty($header)? NULL: $header; ?>
            <?php echo $body ?>
            <?php echo empty($footer)? NULL:$footer; ?>
        </div>    
    </body>
</html>