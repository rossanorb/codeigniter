<?php

class Autenticado extends Controller{
    public function index(){
        if(!$this->session->userdata('authenticate')){
            redirect('/login'); 
        }        
        header ('Content-type: text/html; charset=UTF-8');
        echo 'logado e sessão iniciada';
         
    }
}

