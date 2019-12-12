<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'article') {
        if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
            article();
        } else {
            echo 'Erreur : aucun identifiant d\'article envoyé !';
        }
    } elseif ($_GET['action'] == 'home') {
        home();
    } elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['article_id']) && is_numeric($_GET['article_id']) > 0) {
            if (!empty($_POST['pseudo']) && !empty($_POST['content'])) {
                comment($_GET['article_id'], $_POST['pseudo'], $_POST['content']);
            } else {
                echo 'Tous les champs doivent être remplis.';
            }
        } else {
            echo 'Erreur : aucun identifiant d\'article envoyé !';
        }
    }
} else {
    home();
}
