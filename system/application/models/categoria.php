<?php

class Categoria extends Model{
        
    public function __construct() {
        parent::Model();
    }
    
    public function insert( $id,  $nome){
            $this->db->insert('categoria',array(
                'id_menu'=>$id,
                'nome'=>$nome                
            ));        
    }
}