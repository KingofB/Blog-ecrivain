<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'article') {
        if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
            article();
        } else {
            echo 'Erreur : aucun identifiant d\'article envoyé !';
        }
    } else if ($_GET['action'] == 'home') {
        home();
    }
} else {
    home();
}
