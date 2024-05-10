<?php
include_once 'include/database.php';

$id = $_GET['id'];
$etat  = $_GET['etat'];
$sqlState = $pdo->prepare('UPDATE commandes SET valider = ? WHERE id=?');
$sqlState->execute([$etat, $id]);
header('location: command.php?id=' . $id);
?>
