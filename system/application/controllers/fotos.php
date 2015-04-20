<?php

class Fotos extends Controller{
    public function index(){
        $this->load->helper('html');
        $this->load->model('menu');
        
        
         
        // lista menu
        $this->load->model('menu');
        $lista_menu = $this->menu->get();
        $html['select_menu'] = $this->load->view('admin/form/select_menu',array('lista_menu'=>$lista_menu),TRUE);
        

        
        $html['javascripts'] = array(JS.'fotos.js'); 
        $html['css'] =  array(link_tag(CSS.'fotos.css'));        
        $html['body'] = $this->load->view('admin/fotos',$html,TRUE);        
        $this->load->view('layouts/home',$html);   
    }
}