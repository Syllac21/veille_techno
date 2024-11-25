<?php
require_once(__DIR__.'../../model/bdd.php');
Class Article
{
    /**
     * Récupère tous les articles de la base de donnée sous forme de tableau
     */
    public function getAllArticle() : array {
        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $getAllArticle = $mysqlClient-> prepare('SELECT * FROM article');
        $getAllArticle->execute();
        return $getAllArticle->fetchAll();
    }

    /**
     * Ajoute un article à la base de donnée.
     * reçoit un tableau contenant des variables string : titre, auteur, resume
     */
    public function addArticle($detailArticle): bool{
        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $addArticle = $mysqlClient->prepare('INSERT INTO article(titre, auteur, resume) VALUES (:titre, :auteur, :resume)');
        return $addArticle->execute([
            'titre'=>$detailArticle['titre'],
            'auteur'=>$detailArticle['auteur'],
            'resume'=>$detailArticle['resume'],
        ]);
    }

    /**
     * Récupère l'article correspondant à l'id.
     * Reçoit l'id sous la forme d'une variable int.
     */
    public function getArticle($id) : array
    {
        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $getArticle = $mysqlClient->prepare('SELECT * FROM article WHERE id=:id');
        $getArticle->execute([
            'id' => $id,
        ]);
        $articleDetail = $getArticle->fetchAll(PDO :: FETCH_ASSOC);
        
        $article=[
            'id'=>$articleDetail[0]['id'],
            'titre'=>$articleDetail[0]['titre'],
            'resume'=>$articleDetail[0]['resume'],
            'auteur'=>$articleDetail[0]['auteur'],
        ];
        return $article;

    }

    /**
     * Modifie l'article correpondant à l'id
     * Reçoit l'id sous la forme d'une variable int.
     */
    public function modArticle(array $postData):bool
    {
        $id = $postData['id'];
        $titre = $postData['titre'];
        $resume = $postData['resume'];
        $auteur = $postData['auteur'];

        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $modArticle = $mysqlClient->prepare('UPDATE article SET titre = :titre, resume=:resume, auteur=:auteur WHERE id=:id');
        return $modArticle->execute([
            'id'=>$id,
            'titre'=>$titre,
            'resume'=>$resume,
            'auteur'=>$auteur,
        ]);
    }

    /**
     * supprime l'article correspondant à l'id
     * Reçoit l'id sous la forme d'une variable int.
     */
    public function delArticle($id):bool
    {
        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $delArticle = $mysqlClient->prepare('DELETE FROM article WHERE id=:id');
        return $delArticle->execute([
            'id'=> $id,
        ]);
    }




}