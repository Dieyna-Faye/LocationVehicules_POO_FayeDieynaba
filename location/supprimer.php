<?php
require_once __DIR__ . '/../Crud/Vehicule_crud.php';

$crud = new Vehicule_crud();


if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header('Location: ../dasbordvehicule.php?erreur=id_manquant');
    exit;
}

$id = (int) $_GET['id'];


$resultat = $crud->delete($id);


if($resultat === "impossible"){
    header("Location: ../dasbordvehicule.php?erreur=vehicule_loue");
    exit;
} elseif($resultat){
    header("Location: ../dasbordvehicule.php?success=supprime");
    exit;
} else {
    header("Location: ../dasbordvehicule.php?erreur=suppression");
    exit;
}
