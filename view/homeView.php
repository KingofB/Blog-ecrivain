<?php $homePath = '#'; ?>

<?php ob_start(); ?>
<main role="main">
    <div class="jumbotron mt-5 text-white">
        <div class="container">
            <h1 class="display-3">Billet simple pour l'Alaska</h1>
            <p>Jean Forteroche, auteur de récits d'aventure, vous fait découvrir en avant-première, au travers de ce blog, son dernier roman. Vous pourrez y lire des extraits de chapitres et y réagir en les commentant. L'auteur désire ainsi, faire évoluer
                le rôle de lecteur et sa relation à l'auteur.</p>
            <?php $last_article = $last_3_articles[0]; ?>
            <p><a class="btn btn-primary btn-lg" href="http://localhost/proj4/article.php?article_id=<?= $last_article['id'] ?>" role="button">Découvrir le dernier extrait</a></p>
        </div>
    </div>

    <div class="container-fluid">
        <h2 class="text-primary text-center" id="chapters">Découvrez et commentez mes derniers chapitres</h2>
        <div class="row">
            <?php foreach ($last_3_articles as $article) { ?>
                <div class="card col-md-4  pt-3" style="width: 18rem;">
                    <img src="<?= '/proj4/public/images/' .  $article['image'] ?>" class="card-img-top" alt="<?= $article['alt_image'] ?>">
                    <div class="card-body">
                        <h3 class="card-title text-primary"><?= htmlspecialchars($article['title']) ?></h3>
                        <p class="card-text"><?= nl2br(htmlspecialchars($article['summary'])) ?></p>
                        <a href="http://localhost/proj4/article.php?article_id=<?= $article['id'] ?>" class="btn btn-primary">Lire l'extrait</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <?php foreach ($articles_4_to_6 as $article) { ?>
                <div class="card col-md-3  pt-3" style="width: 18rem;">
                    <img src="<?= '/proj4/public/images/' . $article['image'] ?>" class="card-img-top" alt="<?= $article['alt_image'] ?>">
                    <div class="card-body">
                        <h3 class="card-title text-primary"><?= htmlspecialchars($article['title']) ?></h3>
                        <p class="card-text"><?= nl2br(htmlspecialchars($article['summary'])) ?></p>
                        <a href="http://localhost/proj4/article.php?article_id=<?= $article['id'] ?>" class="btn btn-primary">Lire l'extrait</a>
                    </div>
                </div>
            <?php } ?>
            <div class="card col-md-3  pt-3" style="width: 18rem;" id="archives">
                <h3 class="card-title text-primary text-center">Archives</h3>
                <?php foreach ($archives as $article) { ?>
                    <ul>
                        <li><a href="http://localhost/proj4/article.php?article_id=<?= $article['id'] ?>"><?= htmlspecialchars($article['title']) ?></a></li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>