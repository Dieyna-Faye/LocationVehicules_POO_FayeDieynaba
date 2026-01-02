<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Location.php';
require_once __DIR__ . '/../models/Client.php';
require_once __DIR__ . '/../models/Vehicule.php';

class Location_crud {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        }
    public function getAll() {
    $stmt = $this->db->query("
        SELECT l.id, 
               c.nom AS client_nom, 
               v.marque AS vehicule_marque, 
               v.modele AS vehicule_modele, 
               l.date_debut, 
               l.date_fin,
               (DATEDIFF(l.date_fin, l.date_debut) + 1) * v.prix_jour AS prix_total
        FROM locations l
        INNER JOIN clients c ON l.client_id = c.id
        INNER JOIN vehicules v ON l.vehicule_id = v.id
        ORDER BY l.id DESC
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function getById($id) {
        $location = new Location($this->db);
        return $location->getById($id);
    }

    public function store($data) {
        $location = new Location($this->db);
        $location->client_id = $data['client_id'];
        $location->vehicule_id = $data['vehicule_id'];
        $location->date_debut = $data['date_debut'];
        $location->date_fin = $data['date_fin'];
        
        $jours = (strtotime($data['date_fin']) - strtotime($data['date_debut'])) / 86400;
        $location->prix_total = $data['prix_jour'] * max(1, $jours);

        return $location->store();
    }

    public function update($id, $data) {
        $location = new Location($this->db);
        $location->id = $id;
        $location->client_id = $data['client_id'];
        $location->vehicule_id = $data['vehicule_id'];
        $location->date_debut = $data['date_debut'];
        $location->date_fin = $data['date_fin'];

        $jours = (strtotime($data['date_fin']) - strtotime($data['date_debut'])) / 86400;
        $location->prix_total = $data['prix_jour'] * max(1, $jours);

        return $location->update();
    }

    public function delete($id) {
        $location = new Location($this->db);
        return $location->delete($id);
    }
    public function getLast7() {
    $query = "SELECT l.id, c.nom AS client_nom, v.marque AS vehicule_marque, v.modele AS vehicule_modele,
                     l.date_debut, l.date_fin, l.prix_total
              FROM locations l
              JOIN clients c ON l.client_id = c.id
              JOIN vehicules v ON l.vehicule_id = v.id
              ORDER BY l.id DESC
              LIMIT 5"; 

    $stmt = $this->db->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function countLocations() {
    $stmt = $this->db->query("SELECT COUNT(*) AS total FROM locations");
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

public function getHistorique() {
   $sql = "
    SELECT l.*, 
           c.nom AS client_nom,
           v.marque AS vehicule_marque,
           v.modele AS vehicule_modele
    FROM locations l
    JOIN clients c ON l.client_id = c.id
    JOIN vehicules v ON l.vehicule_id = v.id
    ORDER BY l.date_fin DESC
";


    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function searchSimple($term){
    $sql = "
        SELECT l.*, c.nom AS client_nom, v.marque AS vehicule_marque, v.modele AS vehicule_modele
        FROM locations l
        JOIN clients c ON l.client_id = c.id
        JOIN vehicules v ON l.vehicule_id = v.id
        WHERE c.nom LIKE ? OR v.marque LIKE ? OR v.modele LIKE ?
        ORDER BY l.date_debut DESC
    ";

    $stmt = $this->db->prepare($sql);
    $stmt->execute(["%$term%", "%$term%", "%$term%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>