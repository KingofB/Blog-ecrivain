<?php
require('model/model.php');

if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
    $article = getArticle($_GET['article_id']);
    $comments = getComments($_GET['article_id']);
    require('view/commentView.php');
} else {
    echo 'Erreur : aucun identifiant d\'article envoyé !';
}
