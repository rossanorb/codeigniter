<?php

class Admin extends Controller{
    
    public function index(){
        //header ('Content-type: text/html; charset=UTF-8');
         $this->load->helper('html');
        
         if( isset($_POST['tipo']) && isset($_POST['nome']) ){
             
            if($_POST['tipo'] != NULL &&  $_POST['tipo'] != 0 ){
                
               
            }
             
         }
                  
         if(isset($_POST['edit'])){
            if( sizeof($_POST['edit']) > 0 ){
                echo 'insere no banco';
               
            }                     
         }

        $html['css'] =  array(link_tag(CSS.'admin.css'));               
        $html['body'] = $this->load->view('admin/main',"",TRUE);        
        $this->load->view('layouts/home',$html);        
         
    }
}

