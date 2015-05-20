<?php

class Fotografias extends Model{
    
    private $name = 'fotografias';
    private $id_categoria;  

    public function __construct() {
        parent::Model();
    }
    
    public function  get_id_cateogoria(){
        return $this->id_categoria;
    }
    
    public function set_id_categoria($id_categoria){
       $this->id_categoria = $id_categoria;
    }

    public function add(array $dados){        
        $this->db->insert($this->name,array(
            'id_categoria'=>$dados['id_categoria'],
            'nome' => substr($dados['src'],0,50),
            'src'=>$dados['src']
        ));
    }
    
    public function get_gallery($id_cateogira){
        if( filter_var($id_cateogira, FILTER_VALIDATE_INT) ){
            $this->db->select('
                            fotografias.src as src,
                            fotografias.nome as fotografia_nome,
                            fotografias.id_fotografias as id_fotografia,
                            menu.id_menu as id_menu,
                            menu.nome as menu_nome,
                            menu.id_tipo as tipo,
                            categoria.id_categoria as id_categoria,
                            categoria.nome as nome_categoria
                    ');
            $this->db->from('menu');
            $this->db->join('categoria','categoria.id_menu = menu.id_menu','left');
            $this->db->join($this->name,'fotografias.id_categoria = categoria.id_categoria','left');
            $query = $this->db->where('categoria.id_categoria',$id_cateogira);
            $query = $this->db->get();
            return $query->result();
        }
    }
    
    public function delete($id_fotografia){
        if( filter_var($id_fotografia, FILTER_VALIDATE_INT) ){
            $query = $this->db->get_where($this->name, array('id_'.$this->name => $id_fotografia));
            $row = $query->result()[0];
            $this->set_id_categoria($row->id_categoria);
                    
            if(unlink(FOTOS.$row->src)){                
                $this->db->delete($this->name, array('id_fotografias' => $row->id_fotografias));
                return TRUE;
            }else{                
                return FALSE;
            }
        }
        return FALSE;
    }
    
    public function delete_by_categoria(){
        if( filter_var($this->id_categoria, FILTER_VALIDATE_INT) ){
            $query = $this->db->get_where($this->name, array('id_categoria' => $this->id_categoria));
            $fotografias = $query->result();
            
            foreach ($fotografias as $foto){
                   if(unlink(FOTOS.$foto->src)){ //exclui imagem
                       $this->db->delete($this->name, array('id_fotografias' => $foto->id_fotografias)); //exclui registro
                   }                   
            }
            
        }
        return FALSE;
    }
    
    public function get_by_id_categoria($id){
            $this->db->select('
                    fotografias.src as src,
                    fotografias.nome as fotografia_nome,
                    fotografias.id_fotografias as id_fotografia
                    ')
            ->from('categoria')
            ->join('fotografias','fotografias.id_categoria = categoria.id_categoria')
            ->where('categoria.id_categoria',$id);
            $query = $this->db->get();
            return $query->result();  
    }
    
    public function get_by_id_menu($id){                 
            $this->db->select('
                    fotografias.src as src,
                    fotografias.nome as fotografia_nome,
                    fotografias.id_fotografias as id_fotografia
                    ')
            ->from('menu')
            ->join('categoria','categoria.id_menu = menu.id_menu')
            ->join('fotografias','fotografias.id_categoria = categoria.id_categoria')
            ->where('menu.id_menu',$id);
            $query = $this->db->get();
            return $query->result();        
    }

}