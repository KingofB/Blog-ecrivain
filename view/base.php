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

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <a class="navbar-brand" href="http://localhost/proj4/index.php?action=home">J. FORTEROCHE - écrivain</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/proj4/index.php?action=home">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/proj4/index.php?action=connexion">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#archives">Archives</a>
                </li>
            </ul>
        </div>
    </nav>

    <?= $content ?>


    <footer class="container-fluid text-white text-center">
        <div class="card bg-primary">
            <div class="card-body">
                <p>Copyright © <a class="text-light" href="http://cv-devweb.dblanchet.fr/" target="blank">David Blanchet</a> - 2019/2020. Tous droits réservés</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>