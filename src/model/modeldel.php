<?php
$postData = $_POST;
require_once(__DIR__.'../../controller/Article.php');
$objArticle = new Article;

if(
    isset($postData['id']) 
    ){
        if(
            (strip_tags(trim($postData['id'])) != '') && (is_numeric(strip_tags(trim($postData['id']))))
        ){
            if($objArticle->delArticle($postData['id'])){
                header('location:/');
            }else
                echo "erreur dans le transfert vers la base de donnée<a href='/?action=add'>retourner sur le formulaire</a>";
        } else{
            echo "tous les champs doivent être remplis <a href='/?action=add'>retourner sur le formulaire</a>";
        }
    }else{
        echo "tous les champs doivent être remplis <a href='/?action=add'>retourner sur le formulaire</a>";
    }