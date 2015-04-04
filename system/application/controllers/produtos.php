<?php
 class Produtos extends Controller {

    function index(){
       echo 'Isto é a portada de produtos';
    }
    
    function computadores($marca=null, $modelo=null){
       if (is_null($marca) && is_null($modelo)){
          echo 'Aqui se mostram os produtos de computadores';
       }elseif(is_null($modelo)){
          echo 'Mostrando computadores de marca ' . $marca;
       }else{
          echo 'Mostrando computadores de marca ' . $marca . ' e modelo ' . $modelo;
       }
    }
    
    function monitores(){
       echo 'Aqui se mostram os produtos de monitores';
    }
    
    function perifericos($modelo){
       echo ' Você está vendo o periférico ' . $modelo;
    }    
 }
 ?> 