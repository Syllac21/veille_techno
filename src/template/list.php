<?php
require_once(__DIR__.'../../controller/Article.php');
$title='Liste des articles';
$objArticle = new Article;
$articles = $objArticle->getAllArticle();

ob_start();?>
<main class="">
    <h1>Les articles</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">
                    auteur
                </th>
                <th scope="col">
                    titre
                </th>
                <th scope="col">
                    modifier
                </th>
                <th scope="cole">
                    supprimer
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($articles as $article): ?>
                
                    <tr>
                        <td><?=$article['auteur'] ?></td>
                        <td><a href="/?action=details&id=<?=$article['id']?>"><?=$article['titre'] ?></a></td>
                        <td><a href="/?action=mod&id=<?=$article['id']?>">Modifier</a></td>
                        <td><a href="/?action=del&id=<?=$article['id']?>">Supprimer</a></td>
                    </tr>
                
                <?php endforeach;?>
        </tbody>
    </table>
</main>

<?php
$content = ob_get_clean();

require_once(__DIR__.'../../component/layout.php');
