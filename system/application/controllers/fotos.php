<?php

class Fotos extends Controller{
    public function index(){
        $this->load->helper('html');
        $this->load->model('menu');
        
        
         
        // lista menu
        $this->load->model('menu');
        $html['select_menu'] = $this->menu->get();        
        

        
        $html['javascripts'] = array(JS.'fotos.js'); 
        $html['css'] =  array(link_tag(CSS.'fotos.css'));        
        $html['body'] = $this->load->view('admin/fotos',$html,TRUE);        
        $this->load->view('layouts/home',$html);   
    }
    
    public function categoria(){
        $this->load->model('categoria');
        $query = $this->categoria->lista($_POST['id']);
        $json['select'] = $this->load->view('admin/form/select_categoria',array('query'=>$query),TRUE);        
        echo json_encode($json);
    }
    
    public function upload(){
        
    }
    
}