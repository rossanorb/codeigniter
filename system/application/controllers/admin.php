<?php

class Admin extends Controller{
    
    public function index(){
        //header ('Content-type: text/html; charset=UTF-8');
         $this->load->helper('html');
        
         if( isset($_POST['tipo']) && isset($_POST['nome']) ){
            if($_POST['tipo'] != NULL &&  $_POST['tipo'] != 0 && $_POST['nome'] != NULL){                
                $this->load->model('menu');
                $this->menu->add($_POST['tipo'], $_POST['nome']);
            }
             
         }
                  
         if(isset($_POST['edit'])){
            if( sizeof($_POST['edit']) > 0 ){
                echo 'insere no banco';
               
            }                     
         }
        
         //select tipo menu
         $this->load->model('tipo');
         $html['select'] = $this->tipo->get();
         
         // lista menu/categoria
         $this->load->model('menu');
         $html['lista_menu'] =$this->menu->get();
         
         
        $html['css'] =  array(link_tag(CSS.'admin.css'));               
        $html['body'] = $this->load->view('admin/main',$html,TRUE);
        $this->load->view('layouts/home',$html);        
         
    }
}

