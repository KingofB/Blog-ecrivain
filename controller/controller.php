<?php
require('model/model.php');

function article()
{
    $article = getArticle($_GET['article_id']);
    $comments = getComments($_GET['article_id']);
    require('view/commentView.php');
}

function home()
{
    $last_3_articles = getThreeLastsArticles();
    $articles_4_to_6 = getLastArticlesFourToSix();
    $archives = getArchives();
    require('view/homeView.php');
}

function comment($article_id, $pseudo, $content)
{
    $pseudo = strtolower(htmlspecialchars($pseudo));
    $respPseudo = pseudoExists($pseudo);
    if ($respPseudo === 1) {
        $author_id = pseudoId($pseudo);
        addComment($article_id, $author_id, $content);
        header('Location: index.php?action=article&article_id=' . $article_id);
    } else {
        echo 'Ce pseudo est inconnu, vous devez vous inscrire pour ajouter un commentaire.';
        die;
        header('Location: index.php?action=connexion');
    }
}

