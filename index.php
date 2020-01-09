<?php
session_start();

require('controller/controller.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'article') {
            articleController();
        } elseif ($_GET['action'] === 'home') {
            home();
        } elseif ($_GET['action'] === 'addComment') {
            addCommentController();
        } elseif ($_GET['action'] === 'connexion') {
            connection();
        } elseif ($_GET['action'] === 'deconnexion') {
            deconnection();
        }
    } else {
        home();
    }
} catch (Exception $error) {
    $errorMessage = $error->getMessage();
    require('view/errorView.php');
}

function articleController()
{
    if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
        article();
    } else {
        throw new Exception('Erreur : aucun identifiant d\'article envoyé !');
    }
}

function addCommentController()
{
    if (isset($_GET['article_id']) && is_numeric($_GET['article_id']) > 0) {
        if (!empty($_POST['pseudo']) && !empty($_POST['content'])) {
            comment($_GET['article_id'], $_POST['pseudo'], $_POST['content']);
        } else {
            throw new Exception('Tous les champs doivent être remplis.');
        }
    } else {
        throw new Exception('Erreur : aucun identifiant d\'article envoyé !');
    }
}

