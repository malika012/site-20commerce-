<?php
session_start();
if(!isset($_SESSION['client'])){
   header('location: connecter.php');  
}

    $idclient = $_SESSION['client']['id'];
    $id = $_POST['id'];
    unset($_SESSION['panier'][$idclient][$id]);
    header("location: ".$_SERVER['HTTP_REFERER']);

    ?>