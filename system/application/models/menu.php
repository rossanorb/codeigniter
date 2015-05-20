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
    
    public function getTipo($id_menu){
        $this->db->select('tipo.id_tipo as id_tipo, tipo.nome');        
        $this->db->from($this->name);
        $this->db->join('tipo','tipo.id_tipo = menu.id_tipo');
        $this->db->where('id_menu', $id_menu);        
        $query = $this->db->get();
        if($query->num_rows > 0)        
            return $query->result()[0]->nome;
        else
            return null;        
                
    }
    
    public function update(array $menu){            
                $data = array(
                    'nome' => $menu['nome']
                );                
                $this->db->where('id_menu', $menu['id_menu']);
                $this->db->update($this->name, $data);            
    }
    
    
    public function delete($id){
        if( filter_var($id, FILTER_VALIDATE_INT) ){                
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
                foreach ($ids as $id => $value){

                    if($tabela == 'fotografias'){
                        if(unlink(FOTOS.$value)){ //exclui imagem
                            $this->db->delete($tabela, array('id_'.$tabela => $id));
                        }
                    }else{
                        $this->db->delete($tabela, array('id_'.$tabela => $id));
                    }                               
                }
            }

            $this->db->trans_complete();
            return TRUE;
        }
        return FALSE;
    }
    
    public function get_menus(){
         $this->db->select('
             tipo.nome as tipo,
             menu.id_menu as id_menu,
             menu.nome as menu
             ')
             ->from('menu')
             ->join('tipo','tipo.id_tipo = menu.id_tipo');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_first_menu(){
        $this->db->select(' 
            menu.nome AS menu,
            categoria.id_categoria AS id_categoria,
            menu.id_menu AS id_menu,
            categoria.nome AS categoria,
            tipo.nome AS tipo            
                ')
            ->from($this->name)
            ->join('categoria','categoria.id_menu = menu.id_menu','')
            ->join('tipo','menu.id_tipo = tipo.id_tipo')
            ->limit(1)    
                ;
        $query = $this->db->get();
        return $query->result()[0];
    }
    

}

