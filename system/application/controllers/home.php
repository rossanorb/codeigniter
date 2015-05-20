<?php

class Home extends Controller {
    
    public $mnu;

    public function index(){
            $this->load->helper('html');
            
            
            $this->monta_menu();
            
            
            
            $html['header'] = $this->load->view('site/header', array('menu'=>$this->mnu), TRUE);
            $html['body'] = $this->load->view('site/main',"",TRUE);
            $html['footer']= $this->load->view('site/footer',"",TRUE);
            $this->load->view('layouts/home',$html);
	}
        
        
        public function monta_menu(){
            $this->load->helper('html');
            $this->load->model('menu');
            $this->load->model('categoria');
            
             $menus = $this->menu->get_menus();
             
             foreach ($menus as $menu){
                 $dados = array();
                 
                 if($menu->tipo == 'categoria'){
                    $dados['id_menu'] = $menu->id_menu;
                    $dados['menu'] = $menu->menu;
                    $this->mnu .=  $this->load->view('site/menu',$dados,TRUE);
                 }
                 else{
                    $dados['menu'] = $menu->menu;
                    $dados['submenus'] = $this->categoria->get_categorias($menu->id_menu);
                    $this->mnu .=   $this->load->view('site/submenu',$dados,TRUE);
                 }
             }
             
        }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */