<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jean Forteroche présente, en avant-première sur son blog, son dernier roman : Billet simple pour l'Alaska.">
    <title>Blog Jean Forteroche - écrivain</title>
    <link href="/proj4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

    <div class="container">
        <div class="card mb-3">
            <img src="<?php echo '/proj4/public/images/' . $article['image']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h3 class="card-title"><?php echo $article['title']; ?></h3>
                <h5 class="card-title"><?php echo $article['summary']; ?></h5>
                <p class="card-text"><?php echo $article['content']; ?></p>
            </div>
        </div>
    </div>

    <footer class=" container-fluid text-white text-center bg-primary">
        <p>Copyright © <a class="text-light" href="http://cv-devweb.dblanchet.fr/" target="blank">David Blanchet</a> - 2019/2020. Tous droits réservés</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="/proj4/dist/js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="/proj4/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>

</html>