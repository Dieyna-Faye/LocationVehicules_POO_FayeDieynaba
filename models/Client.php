<?php
require_once __DIR__ . '/../config/Database.php';

class Client {
    private $conn;
    public $id, $nom, $prenom, $email, $telephone, $adresse;

    public function __construct(){
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function store(){
        $req = $this->conn->prepare("INSERT INTO clients (nom, prenom, email, telephone, adresse) VALUES (?,?,?,?,?)");
        return $req->execute([$this->nom, $this->prenom, $this->email, $this->telephone, $this->adresse]);
    }

    public function getAll(){
        return $this->conn->query("SELECT * FROM clients")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $req = $this->conn->prepare("SELECT * FROM clients WHERE id=?");
        $req->execute([$id]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function update(){
        $req = $this->conn->prepare("UPDATE clients SET nom=?, prenom=?, email=?, telephone=?, adresse=? WHERE id=?");
        return $req->execute([$this->nom, $this->prenom, $this->email, $this->telephone, $this->adresse, $this->id]);
    }

    public function delete($id){
        $req = $this->conn->prepare("DELETE FROM clients WHERE id=?");
        return $req->execute([$id]);
    }
}
?>