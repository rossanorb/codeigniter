<?php

class Login extends Controller {
    
    public function index(){
        $this->load->helper('html');
        $this->load->helper('security');
        
        $html['css'] =  link_tag(CSS.'login.css');

        if(!isset($_POST['email'])){ // verifica se é post
           $html['body'] = $this->load->view('admin/login',"",TRUE);
           $this->load->view('layouts/home',$html);
        }else{
          $this->form_validation->set_rules('email','e-mail','required|valid_email');  //  configura as validações
          $this->form_validation->set_rules('password','password','required');            
          
          if(($this->form_validation->run()==FALSE)){  //   verifica validação
                $html['body'] = $this->load->view('admin/login',"",TRUE);
                $this->load->view('layouts/home',$html);
          }else{
              $this->load->model('usuarios');
              if($this->usuarios->authenticate($_POST['email'], dohash($_POST['password'])) ){
                  echo $this->session->userdata('email');
                  redirect('/autenticado');
              }else{                  
                  $data['error']="e-mail ou password incorreto";
                  $html['body'] = $this->load->view('admin/login',$data,TRUE);
                  $this->load->view('layouts/home',$html);
              }                
          }
        }       
    }
    
}

