<?php

class Autenticado extends Controller{
    public function index(){     
        header ('Content-type: text/html; charset=UTF-8');
        echo 'logado e sessão iniciada';
         
    }
}

