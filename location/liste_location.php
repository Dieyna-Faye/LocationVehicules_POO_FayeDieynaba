<?php
require_once __DIR__ . '/../Crud/Location_crud.php';

$crud = new Location_crud();
$locations = $crud->getAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Locations</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .btn-add {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 20px;
            background-color: #FF7F50;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.3s;
        }

        .btn-add:hover {
            background-color: #ff6333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 15px 10px;
            text-align: left;
        }

        th {
            background-color: #FF7F50;
            color: #fff;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        td.actions {
            display: flex;
            gap: 10px;
        }

        .btn-edit, .btn-delete {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .btn-edit {
            background-color: #1E90FF; 
        }

        .btn-edit:hover {
            background-color: #1c7cd6;
        }

        .btn-delete {
            background-color: #FF4500; 
        }

        .btn-delete:hover {
            background-color: #e63b00;
        }

        @media (max-width: 768px) {
            table, tr, th, td {
                display: block;
                width: 100%;
            }

            tr {
                margin-bottom: 15px;
                border-bottom: 2px solid #ddd;
            }

            th {
                background-color: transparent;
                color: #333;
                font-weight: 600;
                padding: 5px 10px;
            }

            td {
                padding: 10px;
                text-align: right;
                position: relative;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                font-weight: bold;
                text-transform: uppercase;
            }

            td.actions {
                display: flex;
                justify-content: flex-end;
            }
        }
    </style>
</head>
<body>

<h2>Liste des Locations</h2>
<a class="btn-add" href="ajout_location.php">Ajouter une location</a>

<table>
    <tr>
        <th>ID</th>
        <th>Client</th>
        <th>Véhicule</th>
        <th>Date début</th>
        <th>Date fin</th>
        <th>Prix total</th>
        <th>Actions</th>
    </tr>
    <?php if(!empty($locations)): ?>
        <?php foreach($locations as $l): ?>
        <tr>
            <td data-label="ID"><?= $l['id'] ?></td>
            <td data-label="Client"><?= htmlspecialchars($l['client_nom']) ?></td>
            <td data-label="Véhicule"><?= htmlspecialchars($l['vehicule_marque'] . ' ' . $l['vehicule_modele']) ?></td>
            <td data-label="Date début"><?= $l['date_debut'] ?></td>
            <td data-label="Date fin"><?= $l['date_fin'] ?></td>
            <td data-label="Prix total"><?= number_format($l['prix_total'], 2, ',', ' ') ?> €</td>
            <td data-label="Actions" class="actions">
                <a class="btn-edit" href="modifier_location.php?id=<?= $l['id'] ?>">Modifier</a>
                <a class="btn-delete" href="supprimer_location.php?id=<?= $l['id'] ?>" onclick="return confirm('Supprimer cette location ?');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7" style="text-align:center; padding:20px;">Aucune location disponible.</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
