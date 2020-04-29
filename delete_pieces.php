<?php

session_start();

require_once('connexion_base_de_donnee.php');
require_once('include/config.php');



if (!isset($_GET['Action'])) $_GET['Action']="";
$Action=$_GET['Action'];
if ($Action=="Suppression")
{
    $id = (int)$_GET['id'];
    $stmt = $bdd->prepare("DELETE FROM pieces where pieces.id=:id");
    $result2 = $stmt->execute(['id' => $id ?? 1]);

    header('location:liste_pieces_dispos.php');
}