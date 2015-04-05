<?php

class Login extends Controller {
    
    public function index(){
        $html['header'] = $this->load->view('site/header',"",TRUE);
        $html['body'] = $this->load->view('admin/login',"",TRUE);
        $html['footer']= $this->load->view('site/footer',"",TRUE);
        $this->load->view('layouts/home',$html);        
    }
    
}

