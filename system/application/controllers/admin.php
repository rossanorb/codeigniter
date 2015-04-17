<?php

class Admin extends Controller{
    
    public function index(){
        //header ('Content-type: text/html; charset=UTF-8');        
        $this->load->helper('html');
        $this->load->model('menu');
        $this->load->model('categoria');
        
        if( isset($_POST['tipo']) && isset($_POST['nome']) ){
            if($_POST['tipo'] != NULL &&  $_POST['tipo'] != 0 && $_POST['nome'] != NULL){
                if($_POST['tipo'] == 2){
                    $id = $this->menu->add($_POST['tipo'], $_POST['nome']); // insere apenas no menu, deixa para adicionar categoria em outro tela
                }else{
                    $id = $this->menu->add($_POST['tipo'], $_POST['nome']); // adiciona no menu e na categoria , não possui categoria.
                    $this->categoria->insert($id,$_POST['nome']);
                }
            }             
        }
         
         // atualiza menu
        if(isset($_POST['edit']) && sizeof($_POST['edit']) > 0 ){
                $tipo = $this->menu->getTipo($_POST['edit']);
                if($tipo == 'menu'){
                    $this->menu->update($_POST);                    
                }else{
                    $this->menu->update($_POST);
                    $this->categoria->update($_POST);
                }
        }
        
         //select tipo menu
        $this->load->model('tipo');
        $html['select'] = $this->tipo->get();
         
         // lista menu/categoria
        $this->load->model('menu');
        $html['lista_menu'] =$this->menu->get();
         
        $html['javascripts'] =  array(JS.'modal.js',JS.'admin.js'); 
        $html['css'] =  array(link_tag(CSS.'admin.css'));        
        $html['body'] = $this->load->view('admin/main',$html,TRUE);
        $this->load->view('layouts/home',$html);
        
    }
    
    public function delete($id){
       $this->load->model('menu');
       $this->menu->delete($id);
    }
    
    public function categoria(){
        $html = array();
        $this->load->helper('html');
        $this->load->model('categoria');
        $html['id'] = $_POST['id'];
        $html['query'] = $this->categoria->lista($_POST['id']);        
        $html['gerencia_categoria'] = $this->load->view('admin/gerencia_categoria',$html,TRUE);
        echo json_encode($html);
    }
    
    public function add_categoria(){        
        $this->load->model('categoria');
        $this->categoria->insert($_POST['id'],$_POST['nome']);
        $this->categoria();
    }
    
    public function delete_categoria(){
        $this->load->model('categoria');
        $this->categoria->delete($_POST['id_categoria']);
        $this->categoria();
    }
}

