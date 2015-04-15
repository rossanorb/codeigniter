<?php

class Menu extends Model{
    
    protected $name = 'menu';


    public function __construct() {
        parent::Model();
    }
    
    public function add($tipo, $nome){
        $options = array('options' => array('min_range' => 1,2));
        
        if(filter_var($tipo, FILTER_VALIDATE_INT,$options) !== FALSE ){
            
            $this->db->insert('menu',array(
                'nome'=>$nome,
                'id_tipo'=>$tipo
            ));
            return $this->db->insert_id();
        }
    }
    
    public function get(){
        $query = $this->db->get($this->name);
        return $query->result();        
    }
    
    public function getTipo($post){        
        $id = array_keys($post);
        $this->db->select('tipo.id_tipo as id_tipo, tipo.nome');        
        $this->db->from($this->name);
        $this->db->join('tipo','tipo.id_tipo = menu.id_tipo');
        $this->db->where('id_menu', $id[0]);        
        $query = $this->db->get();
        

        return $query->result()[0]->nome;
                
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
    
    
    public function delete($id){
                        
        $this->db->select('fotografias.id_fotografias, menu.id_menu, menu.nome as nome_menu, categoria.id_categoria,categoria.nome as nome_categoria, fotografias.src');
        $this->db->from('menu');
        $this->db->join('categoria', 'categoria.id_menu = menu.id_menu', 'left');
        $this->db->join('fotografias','fotografias.id_categoria = categoria.id_categoria', 'left');
        $query = $this->db->where('menu.id_menu',$id);
        $query = $this->db->get();

        foreach ($query->result() as $row){
            $ids['fotografias'][$row->id_fotografias]  = $row->src;
            $ids['categoria'][$row->id_categoria] = $row->nome_categoria;
            $ids['menu'][$row->id_menu] = $row->nome_menu;
        }

        $this->db->trans_start();
        
        foreach ($ids as $tabela => $ids){
            foreach ($ids as $id => $x){
                $this->db->delete($tabela, array('id_'.$tabela => $id));                 
            }
        }

        $this->db->trans_complete();
        redirect('/admin');
        
    }
    
   

}

