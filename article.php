<?php

require('model/model.php');

$article = getArticle($_GET['article_id']);

$comments = getComments($_GET['article_id']);

require('view/commentView.php');

?>
