<?php
require_once __DIR__ . '/Vehicule.php';

class Motos extends Vehicule {
    private $cylindree;
    private $typeCarburant;

    public function __construct($marque, $modele, $annee, $immat, $prixJour, $cylindree=125, $typeCarburant='Essence'){
        parent::__construct($marque, $modele, $annee, $immat, $prixJour);
        $this->cylindree = $cylindree;
        $this->typeCarburant = $typeCarburant;
    }

    public function getType(): string {
        return 'moto';
    }

    public function getDescription(): string {
        return "Moto {$this->marque} {$this->modele}, {$this->cylindree} cm³, carburant: {$this->typeCarburant}, prix/jour: {$this->prixJour} €";
    }

    public function getCaracteristiques(): array {
        return [
            'Type' => 'Moto',
            'Marque' => $this->marque,
            'Modèle' => $this->modele,
            'Année' => $this->annee,
            'Immatriculation' => $this->immat,
            'Cylindrée' => $this->cylindree.' cm³',
            'Carburant' => $this->typeCarburant,
            'Prix/jour' => $this->prixJour.' €'
        ];
    }
}
?>
