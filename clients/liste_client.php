<?php
require_once __DIR__ . '/../Crud/Client_crud.php';

$clientCrud = new Client_crud();
$clients = $clientCrud->getAll();
?>

<h2>Liste des clients</h2>
<p><a href="ajout_client.php">Ajouter un client</a></p>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Actions</th>
    </tr>

    <?php if(!empty($clients)): ?>
        <?php foreach($clients as $c): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= htmlspecialchars($c['nom']) ?></td>
                <td><?= htmlspecialchars($c['email']) ?></td>
                <td><?= htmlspecialchars($c['telephone']) ?></td>
                <td>
                    <a href="modification_client.php?id=<?= $c['id'] ?>">Modifier</a> |
                    <a href="supprimer_client.php?id=<?= $c['id'] ?>" onclick="return confirm('Supprimer ce client ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5">Aucun client trouvé.</td></tr>
    <?php endif; ?>
</table>
