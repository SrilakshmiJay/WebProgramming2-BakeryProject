<?php
namespace App\Controller;
class AboutController{
    private $twig;

    public function __construct($twig){
        $this->twig = $twig;
    }

    public function index(){
    
        return $this->twig->render("about/index.twig");
    }
}

