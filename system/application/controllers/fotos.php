<?php

class Fotos extends Controller{
    
    private $error;
    private $dados;


    public function index(){
        $this->load->helper('html');
        $this->load->model('menu');
         
        // lista menu
        $this->load->model('menu');
        $html['select_menu'] = $this->menu->get();
        
        $html['javascripts'] = array(PLUGINS.'photo-gallery.js',JS.'fotos.js' ); 
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
                $id_categoria = $this->categoria->get_id( $this->input->post('menu') );
                if($id_categoria){
                    $this->fotografias->add(array(
                                'id_categoria' => $id_categoria,
                                'src' => $this->dados['file_name']
                            ));
                    $retorno['msg'] = 'upload realizado com sucesso.';
                }
            }else{
                 $retorno['error'] = $this->error;
            }
        }else{
            $retorno['error'] = 'Nenhuma categoria selecionada para o menu ';
        }
        
        $retorno['id_menu'] = $this->input->post('menu');
        $retorno['id_categoria'] = $this->input->post('categoria');
        
        $this->session->set_flashdata('retorno', $retorno);
        redirect('/fotos/');
    }
    
}