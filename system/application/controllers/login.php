<?php

class Login extends Controller {
    
    public function index(){
        $this->load->helper('html');
        $html['css'] =  link_tag(CSS.'login.css');
        $html['body'] = $this->load->view('admin/login',"",TRUE);        
        $this->load->view('layouts/home',$html);
    }
    
}

