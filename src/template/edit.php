<?php
require_once(__DIR__.'../../controller/Article.php');
$title='Liste des articles';
$objArticle = new Article;
$detailArticle = $objArticle->getArticle($_GET['id']);

ob_start();?>
<form action="../src/model/modelMod.php" method="POST" name="addArticle" enctype="multipart/form-data" class="form">
    <input type="hidden" name="id" value=<?=$detailArticle['id']?>>
    <div class="mb-3">
      <label for="titre" class="form-label">Titre</label>
      <input type="text" class="form-control" id="titre" placeholder="Titre de l'article" name="titre" value=<?=$detailArticle['titre']?>>
    </div>
    <div class="mb-3">
      <label for="resume" class="form-label">Résumé de l'article</label>
      <textarea class="form-control" id="resume" rows="3" name="resume"><?=$detailArticle['resume']?></textarea>
    </div>
    <div class="mb-3">
      <label for="auteur" class="form-label">Auteur</label>
      <input type="text" class="form-control" id="titre" placeholder="Auteur" name="auteur" value=<?=$detailArticle['auteur']?>>
    </div>
    <button type="submit">envoyer</button>
</form>
<?php
$content = ob_get_clean();
require_once(__DIR__.'../../component/layout.php');