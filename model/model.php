<?php

function getThreeLastsArticles()
{
    // Connexion bdd :
    try {
        $db = new PDO('mysql:host=localhost;dbname=proj4;charset=utf8', 'root', 'Op04Er08Ki16');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // Récup des 3 derniers articles :
    return $db->query('SELECT id, title, image, summary FROM Article ORDER BY publication_date DESC LIMIT 0, 3');

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
    return $db->query('SELECT id, title, image, summary FROM Article ORDER BY publication_date DESC LIMIT 3, 3');

}


function getArchives()
{
    // Connexion bdd :
    try {
        $db = new PDO('mysql:host=localhost;dbname=proj4;charset=utf8', 'root', 'Op04Er08Ki16');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // Récup des plus vieux articles :
    return $db->query('SELECT id, title FROM Article ORDER BY publication_date DESC LIMIT 6, 1');


}

?>