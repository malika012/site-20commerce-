<?php
require_once 'include/database.php';

$id = $_GET['id_produit'];
 $sqlState = $pdo->prepare('DELETE FROM produit WHERE id_produit=?');
$supprime = $sqlState->execute([$id]);
header('location: produit.php');