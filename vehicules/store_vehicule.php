<?php
require_once __DIR__ . '/../Crud/Vehicule_crud.php';
$crud = new Vehicule_crud();
$crud->store($_POST);
header("Location: ../dasbordvehicule.php");
?>