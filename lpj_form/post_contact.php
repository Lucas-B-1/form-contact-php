<!-- Code inspiré de https://www.youtube.com/watch?v=Dw9R0NEXuYo -->
<?php
require '_inc.php';
// On rentre les différents types d'erreurs qu'on peut rencontrer en remplissant le form
$errors = [];

$validator =new Validator ($_POST);
$validator->check('name', 'required');
$validator->check('firstname', 'required');
$validator->check('email', 'email');
$validator->check('mobile', 'required');
$validator->check('message', 'required');
$errors = $validator->errors();


// S'il y a des erreurs dans mon form on renvoi à la page précédente
if(!empty($errors)){
  $_SESSION['errors'] = $errors ;
  $_SESSION['inputs'] = $_POST ;
  header('Location: index.php');
}else{
  $_SESSION['success'] = 1;
  $message=$_POST['message'];
  $headers= 'FROM: ' . $_POST['email'];
  mail('ENTRER ADRESSE MAIL VALIDE', "Formulaire de contact de " .$_POST['firstname']. " " .$_POST['name']. "", $_POST['message'], $headers ); // ('to', 'subject', 'message', 'headers') les headers permettent de rajouter des arguments à notre mail
  header('Location: index.php'); // On redirige vers l'index une fois le form envoyé et que c'est ok
}


var_dump($errors);
die();