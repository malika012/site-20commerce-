<?php
session_start();
if(!isset($_SESSION['client'])){
   header('location: connecter.php');  
}

    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $idclient = $_SESSION['client']['id'];
      if(!isset($_SESSION['panier'][$idclient])){
        $_SESSION['panier'][$idclient]=[];
      }
      if($qty == 0){
        unset(  $_SESSION['panier'][$idclient][$id]);
      }
      else{
        $_SESSION['panier'][$idclient][$id]= $qty;
      }
    
header("location: ".$_SERVER['HTTP_REFERER']);
?>



