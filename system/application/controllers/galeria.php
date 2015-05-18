<?php

class Galeria extends Controller{
    
    private $error;    
    private $id_categoria;
    private $id_menu;
    private $done_delete = FALSE;
    private $html = array();
    private $retorno = array();


    public function index(){
        $this->load->helper('html');
        $this->load->model('menu');
        $this->load->model('categoria');
        $this->load->model('fotografias');
               
        
        /* busca galeria de fotos */        
        if($this->input->post('menu')){
            //  categoria:
            
            // busca categoria se tiver apenas o id_menu
            if($this->input->post('categoria') == NULL)  {
                $this->id_categoria = $this->categoria->get_id( $this->input->post('menu') );
            }else{
                $this->id_categoria = $this->input->post('categoria');
            }
            
            if(!$this->id_categoria)  $this->retorno['error'] = 'categoria não selecionado'; 
            
            $query = $this->fotografias->get_gallery($this->id_categoria); 
            $this->html['gallery'] = $this->load->view('admin/gallery',array('query'=>$query),TRUE);
        }else{
            if(!isset($this->retorno['msg'])){ // não setar erro pois houve exclusão e campos post irão retornar vazio
                $this->retorno['error'] = 'menu não selecionado';
            }
        }
        
        
   
                
        $this->html['retorno'] =  $this->retorno;
        // busca menu
        $this->html['select_menu'] = $this->menu->get();
        

        
        $this->html['javascripts'] = array(PLUGINS.'photo-gallery.js',JS.'galeria.js' );
        $this->html['css'] =  array(link_tag(CSS.'fotos.css'));
        $this->html['body'] = $this->load->view('admin/galeria',$this->html,TRUE);
        $this->load->view('layouts/home',$this->html);
    }

    public function delete_fotografia(){
        $this->load->model('fotografias');
        $excluido = $this->fotografias->delete($this->input->post('id_fotografias'));
        
        if($excluido){
            $this->retorno['status'] = TRUE;
        }else{
            $this->retorno['status'] = FALSE;
        }
        echo json_encode($this->retorno);
        
    }
    
    public function show(){
        $this->load->model('fotografias');
        $this->load->model('categoria');
        $this->id_menu = $this->input->post('id_menu');
        
        if($this->input->post('id_categoria') == 0){ // se é menu busca categoria            
            $this->id_categoria = $this->categoria->get_id( $this->input->post('id_menu'));            
        }else{
            $this->id_categoria = $this->input->post('id_categoria');
        }
        
        $query = $this->fotografias->get_gallery($this->id_categoria);
        $this->html['gallery'] = $this->load->view('admin/gallery',array('query'=>$query),TRUE);
        echo json_encode($this->html);
    }

}
