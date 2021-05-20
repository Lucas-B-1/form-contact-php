<!-- Code inspiré de https://www.youtube.com/watch?v=Dw9R0NEXuYo -->
<?php
    include '_inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">Contact</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="starter-template">
        <!-- Permet d'afficher les erreurs -->
        <?php if(array_key_exists('errors', $_SESSION)): ?>
        <div class="alert alert-danger">
            <?= implode('<br>', $_SESSION['errors']); ?>
        </div>
        <!-- Les erreurs disparaissent quand on actualise -->
        <?php endif; ?>


        <!-- Permet d'afficher les erreurs -->
        <?php if(array_key_exists('success', $_SESSION)): ?>
        <div class="alert alert-success">
            Votre formulaire a été envoyé avec succès!
        </div>
        <!-- Les erreurs disparaissent quand on actualise -->
        <?php endif; ?>


        <form action="post_contact.php" method="POST">  <!-- Cette page sera chargée de traiter les données -->
        <?php $form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []); ?>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->text('name', 'Votre nom'); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->text('firstname', 'Votre prénom'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->email('email', 'Votre email'); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->text('mobile', 'Votre téléphone'); ?>
                </div>
            </div>
                <div class="col-xl-8">
                    <?= $form->textarea('message', 'Votre message'); ?>
                    <?= $form->submit('Envoyer'); ?>
                </div>
            </div>
        </form>
        <h4>Debug :</h4>
        <?= var_dump($_SESSION); ?>
    </div>
</div>

</body>
</html>
<?php 
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);
?>