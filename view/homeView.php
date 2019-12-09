<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Jean Forteroche présente, en avant-première sur son blog, son dernier roman : Billet simple pour l'Alaska.">
    <title>Blog Jean Forteroche - écrivain</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="public/css/style.css" rel="stylesheet">
</head>

<body cz-shortcut-listen="true">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <a class="navbar-brand" href="#">J. FORTEROCHE - écrivain</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#archives">Archives</a>
                </li>
            </ul>
        </div>
    </nav>

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
                            <a href="http://localhost/proj4/article.php?article_id=<?=  $article['id'] ?>" class="btn btn-primary">Lire l'extrait</a>
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

    <footer class=" container-fluid text-white text-center bg-primary">
        <p>Copyright © <a class="text-light" href="http://cv-devweb.dblanchet.fr/" target="blank">David Blanchet</a> - 2019/2020. Tous droits réservés</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>