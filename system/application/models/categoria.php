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

    public function update(array $dados) {        
        foreach ($dados['edit'] as $id => $name) {
            $data = array(
                'nome' => $name
            );
            $this->db->where('id_'.$this->name, $id);
            $this->db->update($this->name, $data);
        }      
    }    

    public function delete($id_categoria){
        if( filter_var($id_categoria, FILTER_VALIDATE_INT) ){
            $this->db->where('id_'.$this->name,$id_categoria)->delete($this->name);
        }
    }
    
    public function lista($id){
            $this->db->select('menu.id_menu as id_menu, categoria.id_categoria as id_categoria, categoria.nome as nome');
            $this->db->from($this->name);
            $this->db->join('menu','categoria.id_menu = menu.id_menu');
            $this->db->where('menu.id_menu',$id);
            $query = $this->db->get();
            return $query->result();
    }
}