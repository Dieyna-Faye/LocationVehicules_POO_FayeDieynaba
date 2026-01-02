<?php
if(isset($_POST['ajouter'])){
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $prix = $_POST['prix'];
    $annee = $_POST['annee'];

    $imageName = time() . "_" . basename($_FILES['image']['name']);
    $targetDir = "uploads/";
    $targetFile = $targetDir . $imageName;

    if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)){
       $sql = "INSERT INTO vehicules (marque, modele, annee, immatriculation, prix_jour, type, image) 
        VALUES ('$marque','$modele','$annee','$immatriculation','$prix_jour','$type','$imageName')";
        mysqli_query($conn,$sql);
        echo "Véhicule ajouté avec image ✔️";
    }else{
        echo "Erreur lors du téléchargement de l'image ❌";
    }
}

$action = "store_vehicule.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un véhicule</title>
    <link rel="stylesheet" href="ajouter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Pacifico&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>🚗 Ajouter un véhicule</h1>
            <p>Remplissez les informations du nouveau véhicule</p>
        </div>

        <form method="POST" action="<?= $action ?>" enctype="multipart/form-data">
            <div class="grid-2">
                <div class="form-group">
                    <label>Marque <span>*</span></label>
                    <input type="text" name="marque" placeholder="Ex: BMW" required>
                </div>

                <div class="form-group">
                    <label>Modèle <span>*</span></label>
                    <input type="text" name="modele" placeholder="Ex: Serie 3" required>
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label>Année <span>*</span></label>
                    <input type="number" name="annee" min="1900" max="<?= date('Y')+1 ?>" placeholder="2023" required>
                </div>

                <div class="form-group">
                    <label>Immatriculation <span>*</span></label>
                    <input type="text" name="immatriculation" placeholder="AB-123-CD" required>
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label>Prix/jour <span>*</span></label>
                    <input type="number" name="prix_jour" step="0.01" min="0" placeholder="85.00" required>
                </div>

                <div class="form-group">
                    <label>Type <span>*</span></label>
                    <select name="type" required>
                        <option value="">-- Sélectionner --</option>
                        <option value="voiture">Voiture</option>
                        <option value="moto">Moto</option>
                        <option value="camion">Camion</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Image du véhicule <span>*</span></label>
                <div class="file-input-wrapper">
                    <input type="file" name="image" id="image" accept="image/*" required onchange="displayFileName()">
                    <label for="image" class="file-input-label">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                        Choisir une image
                    </label>
                    <div class="file-name" id="fileName"></div>
                </div>
            </div>

            <button type="submit" name="ajouter">
                Ajouter le véhicule
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