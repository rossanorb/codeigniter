<?php
 class MeuControlador extends Controller {

    function index(){
       
       $dados = array(
          'titulo' => 'Página de teste',
          'descrição' => 'Esta é a descrição desta página, um pouco mais longa.',
          'corpo' => 'O corpo da página provavelmente será um texto muito longo...<p>Com varios parágrafos</p>'
       );
       
       $this->load->view('visao', $dados);
    }
    
 }
 ?> 