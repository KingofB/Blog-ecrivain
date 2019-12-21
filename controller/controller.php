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
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = register();

        if (empty($errors)) {
            header('/proj4/index.php?action=home');
        }
    }

    require('view/connexionView.php');
}

function register(): array
{
    $errors = [];

    $error = checkPseudo();
    if (null !== $error) {
        $errors['pseudo'] = $error;
    }

    $error = checkEmail();
    if (null !== $error) {
        $errors['email'] = $error;
    }

    $error = checkPassword();
    if (null !== $error) {
        $errors['password'] = $error;
    }

    $error = checkRGPD();
    if (null !== $error) {
        $errors['checkBoxRGPD'] = $error;
    }

    if (empty($errors)) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        addMember($pseudo, $email, $password);
    }

    return $errors;
}

function checkPseudo(): ?string
{
    if (!empty($_POST['pseudo'])) {
        $pseudoCheck = strtolower($_POST['pseudo']);
        $resPseudo = pseudoExists($pseudoCheck);
        if ($resPseudo === 1) {
            return 'Ce pseudo est déjà utilisé, veuillez en choisir un autre.';
        }
    }

    return null;
}

function checkEmail(): ?string
{
    if (!empty($_POST['email'])) {
        if (!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['email'])) {
            return 'L\'adresse mail : ' .  $_POST['email'] . ' n\'est pas valide, veuillez recommencer !';
        }
    } else {
       return 'Veuillez renseigner votre email.';
    }

    return null;
}

function checkPassword(): ?string
{
    if (empty($_POST['password'])) {
        return 'Veuillez choisir un mot de passe.';
    }

    return null;
}

function checkRGPD(): ?string
{
    if (!isset($_POST['checkBoxRGPD'])) {
        return 'Vous devez accepter la politique de confidentialité pour vous inscrire.';
    }

    return null;
}

function member($pseudo)
{
    $member = getMember($pseudo);
    $_SESSION['pseudo'] = $member['pseudo'];
    $_SESSION['email'] = $member['email'];
    $_SESSION['password'] = $member['passw'];
}
