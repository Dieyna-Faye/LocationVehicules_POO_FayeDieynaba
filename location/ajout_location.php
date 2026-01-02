<?php
require_once __DIR__ . '/../Crud/Location_crud.php';
require_once __DIR__ . '/../Crud/Vehicule_crud.php';
require_once __DIR__ . '/../Crud/Client_crud.php';

$vehiculeCrud = new Vehicule_crud();
$clientCrud = new Client_crud();
$locationCrud = new Location_Crud();

$vehicules = $vehiculeCrud->getAll();
$clients = $clientCrud->getAll();
$location = new Location($db);
$vehicule = new Vehicule($db);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $location->ajouter($_POST);
    $vehicule->rendreIndisponible($_POST['vehicule_id']);

    header("Location: ../dasbordlocation.php");
    exit;
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $locationCrud->store($_POST);
    header('Location: ../dasbordloc.php');
    exit;
}

$crud = new Location_Crud();

$recherche = $_GET['recherche'] ?? '';
if($recherche != ''){
    $locations = $crud->searchSimple($recherche);
} else {
    $locations = $crud->getHistorique(); 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une location</title>
    <link rel="stylesheet" href="ajout_location.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Pacifico&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>📋 Ajouter une location</h2>
            <p>Créez une nouvelle location de véhicule</p>
        </div>

        <form method="POST">
            <div class="form-group">
                <label>Client <span>*</span></label>
                <select name="client_id" required>
                    <option value="">-- Sélectionner un client --</option>
                    <?php foreach($clients as $c): ?>
                        <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Véhicule <span>*</span></label>
                <select name="vehicule_id" required>
                    <option value="">-- Sélectionner un véhicule --</option>
                    <?php foreach($vehicules as $v): ?>
                        <option value="<?= $v['id'] ?>"><?= htmlspecialchars($v['marque'] . ' ' . $v['modele'] . ' (' . $v['type'] . ')') ?> - <?= $v['prix_jour'] ?>€/jour</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="price-info" id="priceInfo" style="display: none;">
                <p>Prix par jour</p>
                <div class="price" id="displayPrice">0 €</div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label>Date début <span>*</span></label>
                    <input type="date" name="date_debut" required>
                </div>

                <div class="form-group">
                    <label>Date fin <span>*</span></label>
                    <input type="date" name="date_fin" required>
                </div>
            </div>

            <input type="hidden" name="prix_jour" value="0" id="prix_jour">

            <button type="submit">
                Ajouter la location
            </button>
        </form>
    </div>

  
</body>
</html>