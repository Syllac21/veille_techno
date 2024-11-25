<?php
require_once(__DIR__.'../../controller/Article.php');
$objArticle = new Article;
$article = $objArticle->getArticle($_GET['id']);
$title='supprimer l\'article :'.$article['titre'];

ob_start();?>
<main class="">
    <h1>Supprimer</h1>
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

                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$article['auteur'] ?></td>
                <td><?=$article['titre'] ?></td>
                
            </tr>
        </tbody>
    </table>
    <form action="../src/model/modeldel.php" method="POST">
        <input type="hidden" name='id' value=<?=$article['id']?>>
        <button type="submit">supprimer définitivement?</button>

    </form>
</main>

<?php
$content = ob_get_clean();

require_once(__DIR__.'../../component/layout.php');
