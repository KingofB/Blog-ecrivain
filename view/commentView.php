<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jean Forteroche présente, en avant-première sur son blog, son dernier roman : Billet simple pour l'Alaska.">
    <title>Blog Jean Forteroche - écrivain</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="/proj4/public/css/style.css" rel="stylesheet">
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
                    <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
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

    <div class="container">
        <div class="card mb-3 mt-5">
            <img src="<?php echo '/proj4/public/images/' . $article['image']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h3 class="card-title text-primary"><?php echo $article['title']; ?></h3>
                <h5 class="card-title text-info"><?php echo $article['summary']; ?></h5>
                <p class="card-text"><?php echo $article['content']; ?></p>
            </div>
        </div>
    </div>





    <div class="card text-center">
        <h4 class="bg-primary text-white pb-1">Commentaires</h4>
        <?php
        foreach ($comments as $comment) {
        ?>
        <h6 class="card-header border border-primary text-primary"><?php echo $comment['pseudo'] . ' le : ' . $comment['comment_date_fr']; ?></h5>
        <div class="card-body">
            <p class="card-text"><?php echo $comment['content']; ?></p>
            <a href="#" class="btn btn-outline-primary btn-sm">Signaler</a>
        </div>
        <?php
        }
        ?>
    </div>

    <footer class="container-fluid text-white text-center bg-primary">
        <p>Copyright © <a class="text-light" href="http://cv-devweb.dblanchet.fr/" target="blank">David Blanchet</a> - 2019/2020. Tous droits réservés</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>