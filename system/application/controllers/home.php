<?php

class Home extends Controller {

	public function index(){
            $this->load->helper('html');
          
//            $html['plugins']['css'] = array(
//                link_tag(PLUGINS.'smartmenu/css/sm-core-css.css'),
//                link_tag(PLUGINS.'smartmenu/css/menu.css'),
//                link_tag(PLUGINS.'smartmenu/css/sm-simple/sm-simple.css')
//                );                        
            
//            $html['css'] =  array(link_tag(CSS.'menu.css'));
            
//            $html['plugins']['js'] = array(
//                link_tag(PLUGINS. 'smartmenu/jquery.smartmenus.min.js'),
//                link_tag(PLUGINS. 'smartmenu/smartmenu_init.js')                
//                );
            
//            $html['javascripts'] =  array(link_tag(JS.'my.js'));
            
            $html['header'] = $this->load->view('site/header',"",TRUE);
            $html['body'] = $this->load->view('site/main',"",TRUE);
            $html['footer']= $this->load->view('site/footer',"",TRUE);
            $this->load->view('layouts/home',$html);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */