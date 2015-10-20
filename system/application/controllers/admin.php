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
            
            foreach ($_POST['edit'] as $id_menu => $name){
                $this->menu->update(array('id_menu'=>$id_menu, 'nome'=>$name));
            }

        }
        
         //select tipo menu
        $this->load->model('tipo');
        $html['select'] = $this->tipo->get();
         
         // lista menu/categoria
        $html['lista_menu'] =$this->menu->get();
         
        $html['javascripts'] =  array(JS.'modal.js',JS.'admin.js'); 
        $html['css'] =  array(link_tag(CSS.'admin.css'));        
        $html['body'] = $this->load->view('admin/main',$html,TRUE);
        $this->load->view('layouts/home',$html);
        
    }
    
    public function delete($id){
       $this->load->model('menu');
       $this->menu->delete($id);
       redirect('/admin');
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
        $this->load->model('fotografias');
        $id_categoria = $this->input->post('id_categoria');        
        // exclui fotografias da categoria
        $this->fotografias->set_id_categoria($id_categoria);
        $this->fotografias->delete_by_categoria();        
        // exclui categoria
        $this->categoria->delete($id_categoria);
        $this->categoria();
    }
    
    public function edita_categoria(){
//        $this->categoria();
        
        $this->load->model('categoria');
        $obj = json_decode($_POST['categorias']);        
        foreach ($obj as $row){
            $lista['edit'][$row->id_categoria] = $row->nome;
        }
        $this->categoria->update($lista);
        $this->categoria();

    }
}

