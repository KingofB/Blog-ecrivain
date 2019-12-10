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
