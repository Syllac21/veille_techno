<?php
require_once(__DIR__.'../../controller/Article.php');
$title='Ajouter un article';
ob_start();?>
<form action="../src/model/modelAdd.php" method="POST" name="addArticle" enctype="multipart/form-data" class="form">
    <div class="mb-3">
      <label for="titre" class="form-label">Titre</label>
      <input type="text" class="form-control" id="titre" placeholder="Titre de l'article" name="titre">
    </div>
    <div class="mb-3">
      <label for="resume" class="form-label">Résumé de l'article</label>
      <textarea class="form-control" id="resume" rows="3" name="resume"></textarea>
    </div>
    <div class="mb-3">
      <label for="auteur" class="form-label">Auteur</label>
      <input type="text" class="form-control" id="titre" placeholder="Auteur" name="auteur">
    </div>
    <button type="submit">envoyer</button>
</form>

<?php
$content = ob_get_clean();
require_once(__DIR__.'../../component/layout.php');