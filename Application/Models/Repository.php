<?php

namespace minimo\Models;

use Exception;

abstract class Repository
{
    protected $db;

    function __construct()
    {
        $this->db = $this->connexion();
    }

    protected function connexion()
    {
        try {
    
          if (DB_DRIVER == 'sql') $db = new \PDO('mysql:' . 'minimo');
          else $db = new \PDO('mysql:host=' . 'localhost' . ';dbname=' . 'minimo'. ';charset=utf8', 'admin', 'admin');
    
        } catch (Exception $e) {
          print "Erreur de connexion à la base de données : " . $e->getMessage() . "<br/>";
          die();
        }
        return $db;
    }
}
