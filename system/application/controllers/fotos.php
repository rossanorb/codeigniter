<?php

class Fotos extends Controller{
    
    private $error;
    private $dados;
    private $id_categoria;
    private $id_menu;    
    private $html = array();    

    public function index(){
        $this->load->helper('html');
        $this->load->model('menu');
         
        // lista menu
        $this->load->model('menu');
        $this->html['select_menu'] = $this->menu->get();
        
        $this->html['javascripts'] = array(PLUGINS.'photo-gallery.js',JS.'fotos.js' ); 
        $this->html['css'] =  array(link_tag(CSS.'fotos.css'));        
        $this->html['body'] = $this->load->view('admin/fotos',$this->html,TRUE);        
        $this->load->view('layouts/home',$this->html);   
    }
    
    public function categoria(){
        $this->load->model('categoria');
        $query = $this->categoria->lista($_POST['id']);
        $json['select'] = $this->load->view('admin/form/select_categoria',array('query'=>$query),TRUE);        
        echo json_encode($json);
    }
    
    private function do_upload(){
        $this->config->load('upload'); // carrega arquivo de configuração
        $configs = $this->config->item('upload'); // carrega configuração 
        $this->load->library('upload',$configs);  // carrega classe upload da biblioteca
        
        if( ! $this->upload->do_upload()){
            $this->error =  $this->upload->display_errors();
            return false;
        }else{
            $this->dados =  $this->upload->data();
            return true;            
        }        
    }
    
    public function upload(){
        $this->load->model('categoria');
        $this->load->model('fotografias');
        $this->id_menu = $this->input->post('menu');
        $this->id_categoria = $this->input->post('categoria');
        $retorno = array();
        
        if( $this->input->post('menu') && $this->input->post('categoria') > 0 ){
            // menu
            if($this->do_upload()){
                
                    $this->fotografias->add(array(
                            'id_categoria' => $this->input->post('categoria'),
                            'src' => $this->dados['file_name']
                            ));
                    $retorno['msg'] = 'upload realizado com sucesso.';
                
            }else{
                $retorno['error'] = $this->error;
            }
            
            
        }elseif($this->input->post('menu') && $this->input->post('categoria') == NULL ){
            //  categoria
            if($this->do_upload()){
                $this->id_categoria = $this->categoria->get_id( $this->input->post('menu') );
                
                    if($this->id_categoria){
                        $this->fotografias->add(array(
                                    'id_categoria' => $this->id_categoria,
                                    'src' => $this->dados['file_name']
                                ));
                        $retorno['msg'] = 'upload realizado com sucesso.';
                    }
                
            }
                
        }else{
            $retorno['error'] = 'seleção dos combos menu e categoria são inválidos';
        }
        
        $retorno['id_menu'] = $this->input->post('menu');
        $retorno['id_categoria'] = $this->input->post('categoria');
        $this->html['retorno'] = $retorno;
        
        $this->show_gallery();
        
        $this->index();
    }
    
    public function show_gallery(){
                
        if(!$this->id_menu ){            
            return FALSE;
        }
        
        if($this->id_categoria){            
            $query = $this->fotografias->get_gallery($this->id_categoria);            
            $this->html['gallery'] = $this->load->view('admin/gallery',array('query'=>$query),TRUE);
            return TRUE;
        }        
        return FALSE;
    }
    
    public function delete_fotografia($id_fotografia){
        $this->load->model('fotografias');
        $this->fotografias->delete($id_fotografia);
        $this->id_categoria = $this->fotografias->get_id_cateogoria();
        
        $query = $this->fotografias->get_gallery($this->id_categoria);            
        $this->html['gallery'] = $this->load->view('admin/gallery',array('query'=>$query),TRUE);
        
        $this->index();
        
    }
    
}