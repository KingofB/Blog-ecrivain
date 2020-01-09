<?php

function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=proj4;charset=utf8', 'root', 'Op04Er08Ki16');
    return $db;
}

function getArticle(int $article_id)
{
    $db = dbConnect();
    // Récup de l'article :
    $query = "SELECT id, title, image, alt_image, summary, content FROM Article WHERE id = :id";
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

function addComment(int $article_id, int $author_id, string $content)
{
    $db = dbConnect();
    // Ajout d'un commentaire sur un article :
    $query = $db->prepare('INSERT INTO comment(id, article_id, author_id, content, comment_date)
    VALUES (null, ?, ?, ?, NOW())');

    return $query->execute([$article_id, $author_id, $content]);
}

function pseudoExists(string $pseudo): int
{
    $db = dbConnect();
    $req = $db->query("SELECT COUNT(pseudo) FROM Member WHERE LOWER(pseudo)='$pseudo'");

    return (int) $req->fetchColumn();
}

function pseudoId(string $pseudo): int
{
    $db = dbConnect();
    $author_id = $db->query("SELECT id FROM Member WHERE LOWER(pseudo)='$pseudo'")->fetchColumn();

    return (int) $author_id;
}

function addMember(string $pseudo, string $email, string $password)
{
    $db = dbConnect();
    $query = $db->prepare('INSERT INTO member(id, pseudo, email, passw)
    VALUES (null, ?, ?, ?)');

    return $query->execute([$pseudo, $email, $password]);
}

function getMember(string $pseudo)
{
    $db = dbConnect();
    $req = $db->query("SELECT id, pseudo, email, passw FROM Member WHERE LOWER(pseudo)='$pseudo'");

    return $req->fetchAll()[0];
}
