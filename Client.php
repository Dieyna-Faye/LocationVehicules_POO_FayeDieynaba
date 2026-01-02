<?php
/**
 * test_clients.php
 * Fichier de test pour vérifier que les données clients sont bien récupérées
 * Placez ce fichier à la racine de votre projet
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config/database.php';

echo "<h1>🧪 Test de Récupération des Clients</h1>";
echo "<style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
    h1 { color: #E63F11; }
    h2 { color: #333; margin-top: 30px; }
    .success { background: #d4edda; padding: 15px; border-left: 4px solid #28a745; margin: 10px 0; }
    .error { background: #f8d7da; padding: 15px; border-left: 4px solid #dc3545; margin: 10px 0; }
    .info { background: #d1ecf1; padding: 15px; border-left: 4px solid #0c5460; margin: 10px 0; }
    table { width: 100%; border-collapse: collapse; margin: 20px 0; background: white; }
    th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
    th { background: #E63F11; color: white; }
    tr:hover { background: #f5f5f5; }
</style>";

// Test 1 : Connexion à la base de données
echo "<h2>1️⃣ Test de Connexion</h2>";
try {
    $database = new Database();
    $conn = $database->getConnection();
    echo "<div class='success'>✅ Connexion à la base de données réussie !</div>";
} catch(Exception $e) {
    echo "<div class='error'>❌ Erreur de connexion : " . $e->getMessage() . "</div>";
    exit();
}

// Test 2 : Récupération des clients avec statistiques
echo "<h2>2️⃣ Récupération des Clients</h2>";
try {
    $query = "SELECT 
                c.id,
                c.nom,
                c.prenom,
                c.email,
                c.telephone,
                c.adresse,
                c.numero_permis,
                c.date_inscription,
                COUNT(l.id) as total_locations,
                SUM(CASE WHEN l.statut = 'en_cours' THEN 1 ELSE 0 END) as locations_actives
            FROM clients c
            LEFT JOIN locations l ON c.id = l.client_id
            GROUP BY c.id
            ORDER BY c.date_inscription DESC";
    
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<div class='success'>✅ " . count($clients) . " client(s) trouvé(s)</div>";
    
    if (count($clients) > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Nom Complet</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>N° Permis</th>
                <th>Date Inscription</th>
                <th>Total Locations</th>
                <th>Locations Actives</th>
              </tr>";
        
        foreach ($clients as $client) {
            echo "<tr>";
            echo "<td>" . $client['id'] . "</td>";
            echo "<td><strong>" . htmlspecialchars($client['prenom'] . ' ' . $client['nom']) . "</strong></td>";
            echo "<td>" . htmlspecialchars($client['email']) . "</td>";
            echo "<td>" . htmlspecialchars($client['telephone']) . "</td>";
            echo "<td>" . htmlspecialchars($client['numero_permis']) . "</td>";
            echo "<td>" . date('d/m/Y', strtotime($client['date_inscription'])) . "</td>";
            echo "<td>" . $client['total_locations'] . "</td>";
            echo "<td><strong>" . $client['locations_actives'] . "</strong></td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<div class='info'>ℹ️ Aucun client dans la base. Exécutez le script d'insertion de données de test.</div>";
    }
    
} catch(PDOException $e) {
    echo "<div class='error'>❌ Erreur : " . $e->getMessage() . "</div>";
}

// Test 3 : Statistiques globales
echo "<h2>3️⃣ Statistiques Globales</h2>";
try {
    // Total clients
    $query = "SELECT COUNT(*) as total FROM clients";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $total = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Clients actifs (avec location en cours)
    $query = "SELECT COUNT(DISTINCT client_id) as actifs 
              FROM locations 
              WHERE statut = 'en_cours'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $actifs = $stmt->fetch(PDO::FETCH_ASSOC)['actifs'];
    
    // Nouveaux ce mois
    $query = "SELECT COUNT(*) as nouveaux 
              FROM clients 
              WHERE YEAR(date_inscription) = YEAR(CURDATE()) 
              AND MONTH(date_inscription) = MONTH(CURDATE())";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $nouveaux = $stmt->fetch(PDO::FETCH_ASSOC)['nouveaux'];
    
    echo "<div class='success'>";
    echo "📊 <strong>Total Clients :</strong> $total<br>";
    echo "✅ <strong>Clients Actifs :</strong> $actifs<br>";
    echo "🆕 <strong>Nouveaux ce Mois :</strong> $nouveaux";
    echo "</div>";
    
} catch(PDOException $e) {
    echo "<div class='error'>❌ Erreur : " . $e->getMessage() . "</div>";
}

// Test 4 : Vérification de la structure de la table
echo "<h2>4️⃣ Vérification de la Structure de la Table 'clients'</h2>";
try {
    $query = "DESCRIBE clients";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $colonnes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<div class='success'>✅ Structure de la table 'clients' :</div>";
    echo "<table>";
    echo "<tr><th>Colonne</th><th>Type</th><th>Null</th><th>Clé</th><th>Défaut</th></tr>";
    
    foreach ($colonnes as $col) {
        echo "<tr>";
        echo "<td><strong>" . $col['Field'] . "</strong></td>";
        echo "<td>" . $col['Type'] . "</td>";
        echo "<td>" . $col['Null'] . "</td>";
        echo "<td>" . $col['Key'] . "</td>";
        echo "<td>" . ($col['Default'] ?? 'NULL') . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
} catch(PDOException $e) {
    echo "<div class='error'>❌ Erreur : " . $e->getMessage() . "</div>";
}

echo "<hr>";
echo "<h2>✅ Tests Terminés !</h2>";
echo "<div class='info'>";
echo "Si tous les tests sont verts ✅, vous pouvez accéder à la page :<br><br>";
echo "<strong>👉 <a href='?page=clients' style='color: #E63F11; font-size: 18px;'>http://localhost/projet-voiture/?page=clients</a></strong>";
echo "</div>";
?>