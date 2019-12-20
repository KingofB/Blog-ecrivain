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

function connexion()
{
    if (isset($_POST['newMember'])) {
        register();
        require('view/connexionView.php');
    } else {
        require('view/connexionView.php');
    }
}

function register()
{
    if (!empty($_POST['pseudo'])) {
        $pseudoCheck = strtolower($_POST['pseudo']);
        $resPseudo = pseudoExists($pseudoCheck);
        if ($resPseudo === 1) {
            echo 'Ce pseudo est déjà utilisé, veuillez en choisir un autre.';
            die;
            require('/proj4/index.php?action=connexion');
        } else {
            checkEmail();
        }
    }
}

function checkEmail()
{
    if (!empty($_POST['email'])) {
        if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['email'])) {
            checkPassword();
        } else {
            echo 'L\'adresse mail : ' .  $_POST['email'] . ' n\'est pas valide, veuillez recommencer !';
            die;
            require('/proj4/index.php?action=connexion');
        }
    } else {
        echo 'Veuiilez renseigner votre email.';
        die;
        require('/proj4/index.php?action=connexion');
    }
}

function checkPassword()
{
    if (!empty($_POST['password'])) {
        checkRGPD();
    } else {
        echo 'Veuiilez choisir un mot de passe.';
        die;
        require('/proj4/index.php?action=connexion');
    }
}

function checkRGPD()
{
    if (isset($_POST['checkBoxRGPD'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        addMember($pseudo, $email, $password);

        header('/proj4/index.php?action=home');
        $connexion = $pseudo . ' - Se déconnecter';
    } else {
        echo 'Vous devez accepter la politique de confidentialité pour vous inscrire.';
        die;
        require('/proj4/index.php?action=connexion');
    }
}

function member($pseudo)
{
    $member = getMember($pseudo);
    $_SESSION['pseudo'] = $member['pseudo'];
    $_SESSION['email'] = $member['email'];
    $_SESSION['password'] = $member['passw'];
}



