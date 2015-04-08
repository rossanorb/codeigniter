<?php

class Usuarios extends Model{
    
    public function __construct() {
        parent::Model();
    }
    
    public function authenticate($email,$password){
       $query = $this->db->where('usuario',$email)
                         ->where('password',$password)
                         ->get('usuarios');
       if($query->row()) $this->start_session($email); 
       return $query->row();    //   retorna ao controlador o registro que coincide com a busca. (FALSE no caso de não exista)
    }
    
    private function start_session($email){
        $this->session->set_userdata(array(
            'authenticate' => true,
            'email'=> $email
        ));
        return;
    }
    
}
