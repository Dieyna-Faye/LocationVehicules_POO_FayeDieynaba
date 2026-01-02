<?php
require_once __DIR__ . '/../config/Database.php';

class Client_crud {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

   public function countClients() {
    $stmt = $this->db->query("SELECT COUNT(*) AS total FROM clients");
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}



    
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM clients ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM clients WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store($data) {
        $stmt = $this->db->prepare("INSERT INTO clients (nom, email, telephone) VALUES (?, ?, ?)");
        return $stmt->execute([
            $data['nom'],
            $data['email'],
            $data['telephone']
        ]);
    }

   
    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE clients SET nom=?, email=?, telephone=? WHERE id=?");
        return $stmt->execute([
            $data['nom'],
            $data['email'],
            $data['telephone'],
            $id
        ]);
    }

   
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM clients WHERE id=?");
        return $stmt->execute([$id]);
    }
    
    public function search($term) {
    $sql = "SELECT * FROM clients WHERE nom LIKE ? OR email LIKE ? OR telephone LIKE ? ORDER BY id DESC";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        "%$term%",
        "%$term%",
        "%$term%"
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}





?>
