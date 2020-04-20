<?php 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=stockapp_database;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}