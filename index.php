<?php
require('classe/view/commentView.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jean Forteroche présente, en avant-première sur son blog, son dernier roman : Billet simple pour l'Alaska.">
    <title>Blog Jean Forteroche - écrivain</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

    <main role="main bg-primary">
        <div class="jumbotron mt-5 text-white">
            <div class="container">
                <h1 class="display-3">Billet simple pour l'Alaska</h1>
                <p>Jean Forteroche, auteur de récits d'aventure, vous fait découvrir en avant-première, au travers de ce blog, son dernier roman. Vous pourrez y lire des extraits de chapitres et y réagir en les commentant. L'auteur désire ainsi, faire évoluer
                    le rôle de lecteur et sa relation à l'auteur.</p>
                <p><a class="btn btn-primary btn-lg" href="#chapters" role="button">Extraits et commentaires</a></p>
            </div>
        </div>

        <div class="container-fluid">
            <h2 class="text-primary text-center mt-3 pt-3" id="chapters">Derniers chapitres - à commenter</h2>
            <div class="row">
                <?php
                // Connexion bdd :
                try {
                    $db = new PDO('mysql:host=localhost;dbname=proj4;charset=utf8', 'root', 'Op04Er08Ki16');
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                // Récup des 3 derniers articles :
                $req = $db->query('SELECT id, title, image, summary FROM Article ORDER BY publication_date DESC LIMIT 0, 3');
                while ($donnees = $req->fetch()) {
                    ?>
                    <div class="card col-md-4  pt-3" style="width: 18rem;">
                        <img src="<?php echo 'public/images/' . $donnees['image']; ?>" class="card-img-top" alt="traîneau de chiens">
                        <div class="card-body">
                            <h3 class="card-title text-primary"><?php echo htmlspecialchars($donnees['title']); ?></h3>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($donnees['summary'])); ?></p>
                            <a href="#" class="btn btn-primary">Lire l'extrait - Commenter</a>
                        </div>
                    </div>
                <?php
                }
                // Fin de la boucle des articles :
                $req->closeCursor();
                ?>
            </div>
        </div>

        <div class="container-fluid">
            <h2 class="text-primary text-center mt-3 pt-3" id="chapters-closed">Chapitres précédents - à découvrir uniquement</h2>
            <div class="row">
                <?php
                // Connexion bdd :
                try {
                    $db = new PDO('mysql:host=localhost;dbname=proj4;charset=utf8', 'root', 'Op04Er08Ki16');
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                // Récup des 3 derniers articles :
                $req = $db->query('SELECT id, title, image, summary FROM Article ORDER BY publication_date DESC LIMIT 3, 3');
                while ($donnees = $req->fetch()) {
                    ?>
                    <div class="card col-md-3  pt-3" style="width: 18rem;">
                        <img src="<?php echo 'public/images/' . $donnees['image']; ?>" class="card-img-top" alt="traîneau de chiens">
                        <div class="card-body">
                            <h3 class="card-title text-primary"><?php echo htmlspecialchars($donnees['title']); ?></h3>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($donnees['summary'])); ?></p>
                            <a href="#" class="btn btn-primary">Lire l'extrait</a>
                        </div>
                    </div>
                <?php
                }
                // Fin de la boucle des articles 3 à 6 :
                $req->closeCursor();
                ?>
                <div class="card col-md-3  pt-3" style="width: 18rem;" id="archives">
                    <h3 class="card-title text-primary text-center">Archives</h3>
                    <?php
                    // Connexion bdd :
                    try {
                        $db = new PDO('mysql:host=localhost;dbname=proj4;charset=utf8', 'root', 'Op04Er08Ki16');
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    // Récup des 3 derniers articles :
                    $req = $db->query('SELECT id, title FROM Article ORDER BY publication_date DESC LIMIT 6, 1');
                    while ($donnees = $req->fetch()) {
                    ?>
                    <ul>
                        <li><a href="http://localhost/proj4/commentView.php?article-id=<?php echo $donnees['id']; ?>"><?php echo htmlspecialchars($donnees['title']); ?></a></li>
                    </ul>
                </div>
                <?php
                }
                // Fin de la boucle des archives :
                $req->closeCursor();
                ?>
            </div>
        </div>
    </main>

    <footer class=" container-fluid text-white text-center bg-primary">
        <p>Copyright © <a class="text-light" href="http://cv-devweb.dblanchet.fr/" target="blank">David Blanchet</a> - 2019/2020. Tous droits réservés</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="dist/js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>

</html>