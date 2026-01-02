<?php
require_once __DIR__ . '/../Crud/Client_crud.php';

if(!isset($_GET['id'])) die("ID manquant !");
$clientCrud = new Client_crud();
$client = $clientCrud->getById($_GET['id']);

if(!$client) die("Client introuvable");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $clientCrud->update($_GET['id'], $_POST);
    header('Location: ../dasbordclient.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le client</title>
    <link rel="stylesheet" href="modifier.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Pacifico&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>Modifier le client</h2>
            <p>Modifiez les informations du client</p>
        </div>

        <form method="POST">
            <div class="form-group">
                <label>Nom <span>*</span></label>
                <input type="text" name="nom" value="<?= htmlspecialchars($client['nom']) ?>" required>
            </div>

            <div class="form-group">
                <label>Email <span>*</span></label>
                <input type="email" name="email" value="<?= htmlspecialchars($client['email']) ?>" required>
            </div>

            <div class="form-group">
                <label>Téléphone <span>*</span></label>
                <input type="text" name="telephone" value="<?= htmlspecialchars($client['telephone']) ?>" required>
            </div>

            <button type="submit">
                💾 Enregistrer les modifications
            </button>
        </form>
    </div>
</body>
</html>