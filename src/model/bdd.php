<?php
// test .env
require_once(__DIR__.'/core.php');
setEnvironnement();


// mes variables de connexion à ma BDD

class Model{
    
    public function dbConnect()
    {
        try{
            $database = new PDO('mysql:host='.$_ENV['MYSQL_HOST'].';dbname='.$_ENV['MYSQL_NAME'].';charset=utf8', $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD']);
            return $database;
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $exception){
            die('Erreur : '/$exception->getMessage());
        }
    }

}