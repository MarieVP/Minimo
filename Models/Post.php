<?php

abstract class Post
{
    protected $id;
    protected $author;
    protected $date;
    protected $content;
    protected $title;
    protected $status;
    protected $name;
    protected $category;

    function __construct()
    {
       $this->post = new Post();
    }

    function title(){
        return $this->title;
    }

    function content(){
        return $this->content;
    }
}