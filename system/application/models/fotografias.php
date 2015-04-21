<?php

class Fotografias extends Model{
    
    private $name = 'Fotografias';
        
    public function __construct() {
        parent::Model();
    }
    
    public function add(array $dados){
            $this->db->insert($this->name,array(
                'id_categoria'=>$dados['id_categoria'],
                'nome' => $dados['src'],
                'src'=>$dados['src']
            ));        
    }    
    
}