<?php

class Menu extends Model{
    
    protected $name = 'Menu';


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

        }
    }
    
    public function get(){        
        $query = $this->db->get($this->name);
        return $query->result();        
    }

}

