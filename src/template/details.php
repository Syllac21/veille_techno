<?php
require_once(__DIR__.'../../controller/Article.php');
$objArticle = new Article;
$article = $objArticle->getArticle($_GET['id']);
$title= $article['titre'];
ob_start();

?>
<main>
    <section class="py-5 text-center container">
        <article class="row py-lg-5">
            <div class="col-xxl-5">
                <h1 class="fw-light"><?=$article['titre']?></h1>
                <p class="lead text-body-secondary">
                    <?=$article['resume']?>
                </p>
                <p>
                  <a href="/?action=mod&id=<?=$article['id']?>">Modifier</a>  
                  <a href="/?action=del&id=<?=$article['id']?>">Supprimer</a>  
                </p>
            </div>
        </article>
    </section>
</main>

<?php
$content = ob_get_clean();
require_once(__DIR__.'../../component/layout.php');
