<?php

class Pessoas extends Controller{
    
    public function lista(){
        $dados['pessoas'] = array(
                '1'=>array(
                    'nome' => 'Aline', 'profissao' => 'Advogada',
                    ),
                '2'=>array(
                    'nome' => 'Pedro', 'profissao' => 'Gerente Comercial',
                    ),
            
                '3'=>array(
                    'nome' => 'Priscila', 'profissao' => 'Professora',
                    ),            
            );
        
        
        $this->load->view('pessoas', $dados);
    }   
    
}