<?php

class Tipo extends Model{
    protected $name = 'Tipo';
            
    public function __construct() {
        parent::Model();
    }
    
    public function get(){
        $query = $this->db->get($this->name);
        return $query->result();
    }
        
}