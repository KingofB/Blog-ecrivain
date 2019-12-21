<?php
$connexion = 'Se connecter';
ob_start();
?>
<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="card col-md-6 pt-3 text-center">
            <img src="/proj4/public/images/comments.jpg" class="card-img-top" alt="vieux livre, stylo et loupe">
            <div class="card-body">
                <h3 class="card-title text-primary">S'inscrire</h3>
                <p class="card-text">Il faut vous inscire ou vous connectez pour pouvoir laisser un commentaire sur ce site.</p>
            </div>
        </div>

        <form class="col-md-6 pt-5" action="/proj4/index.php?action=connexion" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer pseudo">
                <span class="error">
                <?php
                if (isset($errors['pseudo'])) {
                    echo $errors['pseudo'];
                }
                ?>
                </span>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer email">
                <?php
                if (isset($errors['email'])) {
                    echo $errors['email'];
                }
                ?>
                <small id="emailHelp" class="form-text text-muted">Votre email, ainsi que toutes vos données personnelles, ne seront divulgués à aucune autre société ou site.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                <?php
                if (isset($errors['password'])) {
                    echo $errors['password'];
                }
                ?>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="checkBoxRGPD" id="exampleCheck1">
                <?php
                if (isset($errors['checkBoxRGPD'])) {
                    echo $errors['checkBoxRGPD'];
                }
                ?>
                <label class="form-check-label" for="exampleCheck1">J'accepte les règles de confidentialité et d'utilisation de ce site.</label>
            </div>
            <button type="submit" id="newMember" class="btn btn-primary">Valider</button>
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('base.php'); ?>