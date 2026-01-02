<?php
require_once __DIR__ . '/../Crud/Vehicule_crud.php';


if(!isset($_GET['id']) || empty($_GET['id'])){
    die("ID manquant !");
}

$crud = new Vehicule_crud();
$vehicule = $crud->getById($_GET['id']);

if(!$vehicule){
    die("Véhicule introuvable !");
}

$action = "update_vehicule.php?id=" . $vehicule['id'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le véhicule</title>
    <link rel="stylesheet" href="modifier.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Pacifico&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>🔧 Modifier le véhicule</h2>
            <p>Modifiez les informations du véhicule</p>
        </div>

        <form method="POST" action="<?= $action ?>" enctype="multipart/form-data">
            <div class="grid-2">
                <div class="form-group">
                    <label>Marque <span>*</span></label>
                    <input type="text" name="marque" value="<?= htmlspecialchars($vehicule['marque']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Modèle <span>*</span></label>
                    <input type="text" name="modele" value="<?= htmlspecialchars($vehicule['modele']) ?>" required>
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label>Année <span>*</span></label>
                    <input type="number" name="annee" min="1900" max="<?= date('Y')+1 ?>" value="<?= $vehicule['annee'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Immatriculation <span>*</span></label>
                    <input type="text" name="immatriculation" value="<?= htmlspecialchars($vehicule['immatriculation']) ?>" required>
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label>Prix/jour <span>*</span></label>
                    <input type="number" name="prix_jour" step="0.01" min="0" value="<?= $vehicule['prix_jour'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Type <span>*</span></label>
                    <select name="type" required>
                        <option value="voiture" <?= $vehicule['type']=='voiture'?'selected':'' ?>>Voiture</option>
                        <option value="moto" <?= $vehicule['type']=='moto'?'selected':'' ?>>Moto</option>
                        <option value="camion" <?= $vehicule['type']=='camion'?'selected':'' ?>>Camion</option>
                    </select>
                </div>
            </div>

            <!-- Affichage de l'image actuelle -->
            <?php if(!empty($vehicule['image'])): ?>
                <div class="current-image">
                    <p>📸 Image actuelle</p>
                    <img src="../vehicules/uploads/<?= htmlspecialchars($vehicule['image']) ?>" alt="Image <?= htmlspecialchars($vehicule['marque']) ?>">
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label>Changer l'image</label>
                <div class="file-input-wrapper">
                    <input type="file" name="image" id="image" accept="image/*" onchange="displayFileName()">
                    <label for="image" class="file-input-label">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                        Choisir une nouvelle image
                    </label>
                    <div class="file-name" id="fileName"></div>
                </div>
            </div>

            <button type="submit">
                💾 Enregistrer les modifications
            </button>
        </form>
    </div>

    <script>
        function displayFileName() {
            const input = document.getElementById('image');
            const fileNameDiv = document.getElementById('fileName');
            
            if (input.files && input.files[0]) {
                fileNameDiv.textContent = '✓ ' + input.files[0].name;
            }
        }
    </script>
</body>
</html>