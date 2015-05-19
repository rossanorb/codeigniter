<?php
$env = strtolower(getenv('APPLICATION_ENV'));

if( $env == 'development' ){
    $config['upload'] = array(
        'upload_path' =>  './uploads/',
        'allowed_types'=> 'gif|jpg|png',
        'max_size'=> 400,
        'max_width'=> 966,
        'max_height' => 648,
        'overwrite' => FALSE
    );
}else{
    $config['upload'] = array(
        'upload_path' =>  './uploads/',
        'allowed_types'=> 'gif|jpg|png',
        'max_size'=> 400,
        'max_width'=> 966,
        'max_height' => 648,
        'overwrite' => FALSE        
    );
}