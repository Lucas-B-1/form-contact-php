<!-- Code inspiré de https://www.youtube.com/watch?v=Dw9R0NEXuYo -->
<?php
    session_start();
// Fonction dump and die
    function dd($var){
        var_dump($var);
        die();
    }

require 'class/Form.php'; 
require 'class/Validator.php';   