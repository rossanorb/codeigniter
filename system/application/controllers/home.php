<?php

class Home extends Controller {

	public function index(){
            $html['header'] = $this->load->view('site/header',"",TRUE);
            $html['body'] = $this->load->view('site/main',"",TRUE);
            $html['footer']= $this->load->view('site/footer',"",TRUE);
            $this->load->view('layouts/home',$html);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */