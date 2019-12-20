<?php
    $connexion = 'Se connecter';
    ob_start();
?>
<div class="container">
    <div class="card mb-3 mt-5">
        <img src="<?= '/proj4/public/images/' . $article['image'] ?>" class="card-img-top" alt="<?= $article['alt_image'] ?>">
        <div class="card-body">
            <h3 class="card-title text-primary"><?= $article['title'] ?></h3>
            <h5 class="card-title text-info"><?= $article['summary'] ?></h5>
            <p class="card-text"><?= $article['content'] ?></p>
        </div>
    </div>
</div>

<div class="container-fluid bg-primary text-white text-center">
    <h4 class="pb-1">Ajouter un commentaire</h4>
</div>

<div class="container text-center mt-4">
    <form action="index.php?action=addComment&amp;article_id=<?= $article['id'] ?>" method="post">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white" id="basic-addon1">Pseudo</span>
            </div>
            <input type="text" name="pseudo" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white">Commentaire</span>
            </div>
            <textarea name="content" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary mb-4">Ajouter</button>
    </form>
</div>

<div class="card text-center">
    <h4 class="bg-primary text-white pb-1">Commentaires</h4>
    <?php foreach ($comments as $comment) { ?>
        <h6 class="card-header text-white bg-info"><?= $comment['pseudo'] . ' le : ' . $comment['comment_date_fr'] ?></h5>
            <div class="card-body">
                <p class="card-text"><?= $comment['content'] ?></p>
                <a href="#" class="btn btn-outline-info btn-sm">Signaler</a>
            </div>
        <?php } ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('base.php'); ?>