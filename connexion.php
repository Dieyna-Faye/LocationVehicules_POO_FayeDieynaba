<?php
require_once 'config/Autan.php';
$auth = new Autan();
$error = null;
if (isset($_POST['login'])) {
    if ($auth->login($_POST['email'], $_POST['password'])) {
        header("Location: dasbordlocation.php");
        exit;
    } else {
        $error = "Identifiants incorrects";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Administration</title>
    <link rel="stylesheet" href="connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Pacifico&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Connexion Admin</h1>
            <p>Accédez à votre espace d'administration</p>
        </div>

        <form method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="📧 Email admin" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="🔒 Mot de passe" required>
            </div>

            <button name="login">
                Se connecter
            </button>

            <?php if($error): ?>
                <div class="error-message">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>