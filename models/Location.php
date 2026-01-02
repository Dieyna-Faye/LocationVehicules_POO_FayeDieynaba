<?php
require_once __DIR__ . '/Client.php';
require_once __DIR__ . '/Vehicule.php';
require_once __DIR__ . '/interface/Louable.php';

class Location {
    private $conn;
    public $id, $client_id, $vehicule_id, $date_debut, $date_fin, $prix_total;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Ajouter une location
    public function store() {
        $stmt = $this->conn->prepare("INSERT INTO locations (client_id, vehicule_id, date_debut, date_fin, prix_total) VALUES (?,?,?,?,?)");
        return $stmt->execute([$this->client_id, $this->vehicule_id, $this->date_debut, $this->date_fin, $this->prix_total]);
    }

    // Récupérer toutes les locations
    public function getAll() {
        $stmt = $this->conn->query("
            SELECT l.*, c.nom AS client_nom, v.marque AS vehicule_marque, v.modele AS vehicule_modele 
            FROM locations l
            JOIN clients c ON l.client_id = c.id
            JOIN vehicules v ON l.vehicule_id = v.id
            ORDER BY l.id DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer une location par ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM locations WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Modifier une location
    public function update() {
        $stmt = $this->conn->prepare("UPDATE locations SET client_id=?, vehicule_id=?, date_debut=?, date_fin=?, prix_total=? WHERE id=?");
        return $stmt->execute([$this->client_id, $this->vehicule_id, $this->date_debut, $this->date_fin, $this->prix_total, $this->id]);
    }

    // Supprimer une location
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM locations WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>
