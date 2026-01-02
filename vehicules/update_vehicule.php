<?php
require_once __DIR__ . '/../Crud/Vehicule_crud.php';
if(!isset($_GET['id'])) die("ID manquant !");
$crud = new Vehicule_crud();
$crud->update($_GET['id'], $_POST);
header("Location: ../dasbordvehicule.php");
?>