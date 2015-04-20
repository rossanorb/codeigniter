<?php
$env = strtolower(getenv('APPLICATION_ENV'));

if( $env == 'development' ){
    $config['upload'] = array(
        'upload_path' => UPLOAD_FOTOS,
        'allowed_types'=> 'gif|jpg|png',
        'max_size'=> 100,
        'max_width'=> 1024,
        'max_height' => 768,
        'overwrite' => FALSE
    );
}else{
    $config['upload'] = array(
        'upload_path' => UPLOAD_FOTOS,
        'allowed_types'=> 'gif|jpg|png',
        'max_size'=> 100,
        'max_width'=> 1024,
        'max_height' => 768,
        'overwrite' => FALSE        
    );
}