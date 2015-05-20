<?php

class Home extends Controller {
    
    private $mnu;
    private $fotos;
        

    public function index($tipo=NULL, $id=NULL){
            $this->load->helper('html');
            $this->monta_menu();
            $this->set_fotos($tipo, $id); //seta fotos
            if($this->fotos != NULL ){ // se fotos foi setado então cria view 
                $html['header'] = $this->load->view('site/header', array('menu'=>$this->mnu), TRUE);
                $html['body'] = $this->load->view('site/main',array('carousel'=>$this->fotos),TRUE);
                $html['footer']= $this->load->view('site/footer',"",TRUE);
                $this->load->view('layouts/home',$html);              
            }else{                
                $this->start_carousel();
            }
	}
        
        
        public function monta_menu(){
            $this->load->helper('html');
            $this->load->model('menu');
            $this->load->model('categoria');
            
             $menus = $this->menu->get_menus();
             
             foreach ($menus as $menu){
                 $dados = array();
                 
                 if($menu->tipo == 'categoria'){
                    $dados['tipo'] = $menu->tipo;
                    $dados['id_menu'] = $menu->id_menu;
                    $dados['menu'] = $menu->menu;
                    $this->mnu .=  $this->load->view('site/menu',$dados,TRUE);
                 }
                 else{
                    $dados['tipo'] = $menu->tipo;
                    $dados['menu'] = $menu->menu;
                    $dados['submenus'] = $this->categoria->get_categorias($menu->id_menu);
                    $this->mnu .=   $this->load->view('site/submenu',$dados,TRUE);
                 }
             }
             
        }
        
        public function set_fotos($tipo, $id){
            $this->load->model('fotografias');
            
            if($tipo == 'categoria' ){
                //categoria
                $this->fotos = $this->fotografias->get_by_id_menu($id);
            }elseif($tipo == 'menu'){
                //menu
                $this->fotos = $this->fotografias->get_by_id_categoria($id);
            }            

        }
        
        public function start_carousel(){
            $this->load->model('menu');
            $menu = $this->menu->get_first_menu();
            
            if($menu->tipo == 'categoria'){
                $this->set_fotos($menu->tipo,  $menu->id_menu);
            }elseif($menu->tipo == 'menu'){
                $this->set_fotos($menu->tipo, $menu->id_categoria);                
            }
            
            $html['header'] = $this->load->view('site/header', array('menu'=>$this->mnu), TRUE);
            $html['body'] = $this->load->view('site/main',array('carousel'=>$this->fotos),TRUE);
            $html['footer']= $this->load->view('site/footer',"",TRUE);
            $this->load->view('layouts/home',$html);            
            
        }
}