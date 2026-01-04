<?php
require_once __DIR__ . '/../models/Vehicule.php';
require_once __DIR__ . '/../models/Voiture.php';
require_once __DIR__ . '/../models/Motos.php';
require_once __DIR__ . '/../models/Camion.php';
require_once __DIR__ . '/../config/Database.php';

class Vehicule_crud {
    private $db;

    public function __construct(){
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM vehicules ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create() {
        $vehicule = null;
        require __DIR__ . '/../vehicules/ajout_vehicule.php';
    }

   
   public function store($data) {
    $type = $data['type'];
    $marque = $data['marque'];
    $modele = $data['modele'];
    $annee = $data['annee'];
    $immat = $data['immatriculation'];
    $prixJour = $data['prix_jour'];

    
    switch($type){
        case 'voiture':
            $v = new Voiture($marque,$modele,$annee,$immat,$prixJour);
            break;
        case 'moto':
            $v = new Motos($marque,$modele,$annee,$immat,$prixJour);
            break;
        case 'camion':
            $v = new Camion($marque,$modele,$annee,$immat,$prixJour);
            break;
        default:
            return false;
    }

    
    $imageName = null;
    if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
        $imageName = time() . "-" . basename($_FILES['image']['name']);
        $target = __DIR__ . "/../uploads/" . $imageName;

       $target = __DIR__ . "/../vehicules/uploads/" . $imageName;   
    if(!move_uploaded_file($_FILES['image']['tmp_name'], $target)){
    die("❌ Erreur lors de l'upload de l'image.");
}

    }

  
    $stmt = $this->db->prepare(
        "INSERT INTO vehicules 
        (marque, modele, annee, type, immatriculation, prix_jour, image) 
        VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    return $stmt->execute([
    $v->getMarque(),
    $v->getModele(),
    $annee,               
    $v->getType(),
    $v->getImmat(),
    $v->getPrixJour(),
    $imageName
]);

}

    public function edit($id){
        $stmt = $this->db->prepare("SELECT * FROM vehicules WHERE id=?");
        $stmt->execute([$id]);
        $vehicule = $stmt->fetch(PDO::FETCH_ASSOC);
        require __DIR__ . '/../vehicules/modification_vehicule.php';
    }


    public function update($id, $data) {
    $vehicule = $this->getById($id);
    $imageName = $vehicule['image']; 

    
    if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
        $imageName = time() . "-" . basename($_FILES['image']['name']);
        $target = __DIR__ . "/../vehicules/uploads/" . $imageName;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            
            if(!empty($vehicule['image']) && file_exists(__DIR__ . "/../vehicules/uploads/" . $vehicule['image'])){
                unlink(__DIR__ . "/../vehicules/uploads/" . $vehicule['image']);
            }
        } else {
            die("❌ Erreur lors de l'upload de la nouvelle image.");
        }
    }

    
$stmt = $this->db->prepare(
    "UPDATE vehicules 
     SET marque=?, modele=?, annee=?, type=?, immatriculation=?, prix_jour=?, image=? 
     WHERE id=?"
);

    
    return $stmt->execute([
        $data['marque'],
        $data['modele'],
        $data['annee'],      
        $data['type'],
        $data['immatriculation'],
        $data['prix_jour'],
        $imageName,
        $id
    ]);
    }

    public function rendreIndisponible($vehicule_id){
        $sql = "UPDATE vehicules SET disponible = 0 WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$vehicule_id]);
    }

    public function rendreDisponible($vehicule_id){
        $sql = "UPDATE vehicules SET disponible = 1 WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$vehicule_id]);
    }
    
    public function delete($id)
    {
    $check = $this->db->prepare(
        "SELECT COUNT(*) FROM locations 
         WHERE vehicule_id = ? AND statut = 'en_cours'"
    );
    $check->execute([$id]);

    if ($check->fetchColumn() > 0) {
        return "impossible";
    }

    $stmt = $this->db->prepare("DELETE FROM vehicules WHERE id = ?");
    return $stmt->execute([$id]);
}



    public function getById($id){
    $stmt = $this->db->prepare("SELECT * FROM vehicules WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


public function countVehicules() {
    $stmt = $this->db->query("SELECT COUNT(*) AS total FROM vehicules");
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

public function filter($data){
    $sql = "SELECT * FROM vehicules WHERE 1=1";
    $params = [];

    if(!empty($data['type'])){
        $sql .= " AND type = ?";
        $params[] = $data['type'];
    }

    if(!empty($data['marque'])){
        $sql .= " AND marque LIKE ?";
        $params[] = "%".$data['marque']."%";
    }

    if(!empty($data['immat'])){
        $sql .= " AND immatriculation LIKE ?";
        $params[] = "%".$data['immat']."%";
    }

    if(!empty($data['prix_max'])){
        $sql .= " AND prix_jour <= ?";
        $params[] = $data['prix_max'];
    }

    $stmt = $this->db->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function getPrixJourById($id)
{
    $stmt = $this->db->prepare(
        "SELECT prix_jour FROM vehicules WHERE id = ?"
    );
    $stmt->execute([$id]);
    return (float) $stmt->fetchColumn();
}

}
?>
