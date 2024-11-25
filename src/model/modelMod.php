<?php
$postData = $_POST;
require_once(__DIR__.'../../controller/Article.php');
$objArticle = new Article;

if(
    isset($postData['titre']) &&
    isset($postData['auteur']) &&
    isset($postData['resume']) 
    ){
        if(
            strip_tags(trim($postData['titre'])) != '' &&
            strip_tags(trim($postData['auteur'])) != '' &&
            strip_tags(trim($postData['resume'])) != ''
        ){
            if($objArticle->modArticle($postData)){
                header('location:/');
            }else
                echo "erreur dans le transfert vers la base de donnée<a href='/?action=add'>retourner sur le formulaire</a>";
        } else{
            echo "tous les champs doivent être remplis <a href='/?action=add'>retourner sur le formulaire</a>";
        }
    }else{
        echo "tous les champs doivent être remplis <a href='/?action=add'>retourner sur le formulaire</a>";
    }