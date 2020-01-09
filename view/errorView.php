<?php
$connexion = 'Se connecter';
ob_start();
?>
<div class="card mt-5">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="/proj4/public/images/error.jpg" class="card-img" alt="1+1=3 sur tableau noir">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text"><?= $errorMessage ?></p>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('base.php'); ?>