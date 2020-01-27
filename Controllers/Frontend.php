<?php

class Frontend {

    public $view;

    function __construct(){
        $this->view = new View();
    }

    function index()
    {
        $page_repository = new PageRepository();
        $donnees_page_accueil = $page_repository->read('accueil');

        $page_accueil = new Page( $donnees_page_accueil);
        $this->view->setVar('page', $page_accueil);
    }

    function page($name = "accueil")
    {
        if(isset($_GET['name']) and $_GET['name'] != "") $name = $_GET['name'];
        $page = new Page([]);

        $this->view->setVar('page', $page);
        $this->view->setVar('view', 'frontend/'.$name);
        echo $this->view->render();
    }
}