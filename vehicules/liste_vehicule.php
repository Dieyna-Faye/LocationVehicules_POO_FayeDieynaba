<?php
require_once __DIR__ . '/../Crud/Vehicule_crud.php';
$vehiculeCrud = new Vehicule_crud();
$vehicules = $vehiculeCrud->getAll(); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des véhicules</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #ff6600;
        }

        .add-btn {
            display: inline-block;
            background-color: #ff6600;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }
        .add-btn:hover {
            background-color: #e65c00;
        }

        .vehicles-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .vehicle-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }
        .vehicle-card:hover {
            transform: translateY(-5px);
        }

        .vehicle-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .vehicle-info {
            padding: 15px;
        }

        .vehicle-info h3 {
            margin: 0 0 10px 0;
            color: #333;
        }

        .vehicle-info p {
            margin: 5px 0;
            color: #555;
            font-size: 0.9rem;
        }

        .vehicle-actions {
            display: flex;
            justify-content: space-between;
            padding: 10px 15px 15px 15px;
        }

        .vehicle-actions a {
            text-decoration: none;
            padding: 7px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: background-color 0.3s;
        }

        .vehicle-actions .edit {
            background-color: #3399ff;
            color: white;
        }
        .vehicle-actions .edit:hover {
            background-color: #2673cc;
        }

        .vehicle-actions .delete {
            background-color: #ff4d4d;
            color: white;
        }
        .vehicle-actions .delete:hover {
            background-color: #e60000;
        }
    </style>
</head>
<body>

<h2>Liste des Véhicules</h2>
<div style="text-align:center;">
    <a href="ajout_vehicule.php" class="add-btn">Ajouter un véhicule</a>
</div>

<div class="vehicles-container">
    <?php if(!empty($vehicules) && is_array($vehicules)): ?>
        <?php foreach($vehicules as $v): ?>
            <div class="vehicle-card">
                <?php if(!empty($v['image']) && file_exists(__DIR__ . "/../vehicules/uploads/" . $v['image'])): ?>
                    <img src="../vehicules/uploads/<?= htmlspecialchars($v['image']) ?>" alt="<?= htmlspecialchars($v['marque']) ?>">
                <?php else: ?>
                    <img src="../vehicules/uploads/default.png" alt="Aucune image">
                <?php endif; ?>
                <div class="vehicle-info">
                    <h3><?= htmlspecialchars($v['marque'] . ' ' . $v['modele']) ?></h3>
                    <p>Type: <?= ucfirst($v['type']) ?></p>
                    <p>Année: <?= $v['annee'] ?></p>
                    <p>Immatriculation: <?= htmlspecialchars($v['immatriculation']) ?></p>
                    <p>Prix/jour: <?= $v['prix_jour'] ?> €</p>
                </div>
                <div class="vehicle-actions">
                    <a href="modification_vehicule.php?id=<?= $v['id'] ?>" class="edit">Modifier</a>
                    <a href="supprimer_vehicule.php?id=<?= $v['id'] ?>" onclick="return confirm('Supprimer ce véhicule ?');" class="delete">Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center; width:100%;">Aucun véhicule disponible.</p>
    <?php endif; ?>
</div>

</body>
</html>
