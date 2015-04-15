<?php

class Categoria extends Model{
    
    private $name = 'categoria';
        
    public function __construct() {
        parent::Model();
    }
    
    public function insert( $id,  $nome){
            $this->db->insert('categoria',array(
                'id_menu'=>$id,
                'nome'=>$nome                
            ));        
    }
    
    public function update(array $dados){
            foreach ($dados['edit'] as $id => $name){
                $data = array(
                    'nome' => $name
                );                
                $this->db->where('id_menu', $id);
                $this->db->update($this->name, $data);
            }
    }
}