<?php

require('model/model.php');

$last_3_articles = getThreeLastsArticles();



$articles_4_to_6 = getLastArticlesFourToSix();

$archives = getArchives();

require('view/homeView.php');

?>

