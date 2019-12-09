<?php

function dbConnect()
{
    // Connexion bdd :
    try {
        $db = new PDO('mysql:host=localhost;dbname=proj4;charset=utf8', 'root', 'Op04Er08Ki16');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getArticle(int $article_id)
{
    $db = dbConnect();
    // Récup de l'article :
    $query = "SELECT title, image, alt_image, summary, content FROM Article WHERE id = :id";
    $sth = $db->prepare($query);
    $sth->execute([':id' => $article_id]);
    $res = $sth->fetchAll()[0];

    return $res;
}


function getThreeLastsArticles()
{
    $db = dbConnect();
    // Récup des 3 derniers articles :
    return $db->query('SELECT id, title, image, alt_image, summary FROM Article ORDER BY publication_date DESC LIMIT 0, 3')->fetchAll();
}

function getLastArticlesFourToSix()
{
    $db = dbConnect();
    // Récup des derniers articles (4 à 6) :
    return $db->query('SELECT id, title, image, alt_image, summary FROM Article ORDER BY publication_date DESC LIMIT 3, 3')->fetchAll();
}


function getArchives()
{
    $db = dbConnect();
    // requête pour compter le nbre d'articles :
    $countArticles = (int) $db->query('SELECT COUNT(id) FROM Article')->fetchColumn(0);
    $limit = $countArticles - 6;

    // Récup des plus vieux articles :
    return $db->query("SELECT id, title FROM Article ORDER BY publication_date DESC LIMIT 6, $limit")->fetchAll();
}

function getComments (int $article_id)
{
    $db = dbConnect();
    // Récup des commentaires d'un article :
    $comments = $db->prepare('SELECT Comment.id, Member.pseudo AS pseudo, content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
    FROM Comment
    INNER JOIN Member ON Comment.author_id = Member.id
    WHERE article_id = ? ORDER BY comment_date DESC');
    $comments->execute([$article_id]);

    return $comments->fetchAll();
}
