<?php

namespace minimo\Controllers;

class Frontend {

    public $view;

    function __construct(){
        $this->view = new minimo\Views\View();
    }

    function index()
    {
        $page_repository = new PageRepository();
        $donnees_page_accueil = $page_repository->read('accueil');

        $page_accueil = new Page( $donnees_page_accueil);
        $this->view->setVar('page', $page_accueil);

        $article_repository = new ArticleRepository();
        $donnees_posts = $article_repository->all();

        $posts_array = array();
        foreach($donnees_posts as $donnees_post){
            $posts_array[] = new Article($donnees_post);
        }

        $this ->view->setvar('articles', $posts_array);
        $this->view->setVar('view', 'frontend/accueil');

        echo $this ->view->render();
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