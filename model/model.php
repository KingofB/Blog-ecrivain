<?php

function getArticle($article_id)
{
    // Connexion bdd :
    try {
        $db = new PDO('mysql:host=localhost;dbname=proj4;charset=utf8', 'root', 'Op04Er08Ki16');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // Récup de l'article :
    /*
    $article = $db->prepare('SELECT title, image, summary, content FROM Article WHERE id = ?');
    $result = $article->execute([(int) $article_id]);
    $article->execute([$article_id])
    */

    $query = "SELECT title, image, summary, content FROM Article WHERE id = :id";
    $sth = $db->prepare($query);
    $sth->execute([':id' => $article_id]);
    $res = $sth->fetchAll()[0];

    return $res;
}


function getThreeLastsArticles()
{
    // Connexion bdd :
    try {
        $db = new PDO('mysql:host=localhost;dbname=proj4;charset=utf8', 'root', 'Op04Er08Ki16');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // Récup des 3 derniers articles :
    return $db->query('SELECT id, title, image, summary FROM Article ORDER BY publication_date DESC LIMIT 0, 3')->fetchAll();

}

function getLastArticlesFourToSix()
{
    // Connexion bdd :
    try {
        $db = new PDO('mysql:host=localhost;dbname=proj4;charset=utf8', 'root', 'Op04Er08Ki16');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // Récup des derniers articles (4 à 6) :
    return $db->query('SELECT id, title, image, summary FROM Article ORDER BY publication_date DESC LIMIT 3, 3')->fetchAll();

}


function getArchives()
{
    // Connexion bdd :
    try {
        $db = new PDO('mysql:host=localhost;dbname=proj4;charset=utf8', 'root', 'Op04Er08Ki16');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // requête pour compter le nbre d'articles :
    $countArticles = (int) $db->query('SELECT COUNT(id) FROM Article')->fetchColumn(0);
    $limit = $countArticles - 6;

    // Récup des plus vieux articles :
    return $db->query("SELECT id, title FROM Article ORDER BY publication_date DESC LIMIT 6, $limit")->fetchAll();
}

?>