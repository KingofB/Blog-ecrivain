<?php ob_start(); ?>
<div class="card bg-primary text-white">
    <img src="/proj4/public/images/comments.jpg" class="card-img" alt="livre, crayon et loupe">
    <div class="card-img-overlay">
        <h5 class="card-title">Connexion / Inscription</h5>
        <p class="card-text">Afin de pouvoir laisser vos commentaires sur ce site, vous devez y être inscrit et vous y connecter.</p>
        <p><a href="">Déjà inscrit ? Se connecter</a></p>
    </div>
</div>

<form action="/proj4/index.php?action=connexion" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Pseudo</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter pseudo">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('base.php'); ?>