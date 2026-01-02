<?php
require_once __DIR__ . '/Crud/Location_crud.php';

$crud = new Location_crud();
$locations = $crud->getHistorique();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="historique.css">
</head>
<body>
    

  
    <div class="table-wrapper">
        <h2>Historique des locations</h2>

            <table>
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Véhicule</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Prix total</th>
                        <th>Statut</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if(!empty($locations)): ?>
                        <?php foreach($locations as $l): ?>
                            <tr>
                                <td><?= htmlspecialchars($l['client_nom']) ?></td>
                                <td><?= htmlspecialchars($l['vehicule_marque'].' '.$l['vehicule_modele']) ?></td>
                                <td><?= $l['date_debut'] ?></td>
                                <td><?= $l['date_fin'] ?></td>
                                <td><?= number_format($l['prix_total'], 0, ',', ' ') ?> FCFA</td>
                                <td>
                                    <span class="status finished">Terminée</span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Aucune location terminée</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

    </div>


</body>
</html>