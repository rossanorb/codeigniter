<?php

class Auth{
    public function validaLogin(){
        $classes = array(
                'Admin',
                'Fotos'
            );
        
        $CI =& get_instance(); 
        $CI->load->library('session');        
        $classe =  get_class($CI);
        
        if(in_array($classe, $classes)){
            if(!$CI->session->userdata('authenticate')){
                redirect('/login'); 
            }            
        }
        
        if($classe == 'Login' && $CI->session->userdata('authenticate')){
            redirect('/admin'); 
        }
    }
}