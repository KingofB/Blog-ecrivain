<?php
require_once('model/ArticleManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');


function article()
{
    $articleManager = new \dblanchet\proj4\model\ArticleManager();
    $commentManager = new \dblanchet\proj4\model\CommentManager();
    $article = $articleManager->getArticle($_GET['article_id']);
    $comments = $commentManager->getComments($_GET['article_id']);
    require('view/commentView.php');
}

function home()
{
    $articleManager = new \dblanchet\proj4\model\ArticleManager();
    $last_3_articles = $articleManager->getThreeLastsArticles();
    $articles_4_to_6 = $articleManager->getLastArticlesFourToSix();
    $archives = $articleManager->getArchives();
    require('view/homeView.php');
}

function comment($article_id, $pseudo, $content)
{
    $commentManager = new \dblanchet\proj4\model\CommentManager();
    $memberManager = new \dblanchet\proj4\model\MemberManager();
    $pseudo = strtolower(htmlspecialchars($pseudo));
    $respPseudo = $memberManager->pseudoExists($pseudo);
    if ($respPseudo === 1) {
        $author_id = $memberManager->pseudoId($pseudo);
        $commentManager->addComment($article_id, $author_id, $content);
        header('Location: index.php?action=article&article_id=' . $article_id);
    } else {
        throw new Exception('Ce pseudo est inconnu, vous devez vous inscrire pour ajouter un commentaire.');
    }
}

function deconnection()
{
   session_destroy();
   header('Location: index.php?action=home');
}

function connection()
{
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = register();

        if (empty($errors)) {
            header('Location: index.php?action=home');
        }
    }

    require('view/connexionView.php');
}

function register(): array
{
    $errors = [];
    $memberManager = new \dblanchet\proj4\model\MemberManager();

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
        $memberManager->addMember($pseudo, $email, $password);
        member($pseudo);
    }

    return $errors;
}

function checkPseudo(): ?string
{
    $memberManager = new \dblanchet\proj4\model\MemberManager();

    if (!empty($_POST['pseudo'])) {
        $pseudoCheck = strtolower($_POST['pseudo']);
        $resPseudo = $memberManager->pseudoExists($pseudoCheck);
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
    $memberManager = new \dblanchet\proj4\model\MemberManager();
    $member = $memberManager->getMember($pseudo);
    $_SESSION['pseudo'] = $member['pseudo'];
    $_SESSION['email'] = $member['email'];
    $_SESSION['password'] = $member['passw'];
}
