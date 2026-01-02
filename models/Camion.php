<?php
require_once __DIR__ . '/Vehicule.php';

class Camion extends Vehicule {
    private $capacite;

    public function __construct($marque, $modele, $annee, $immat, $prixJour, $capacite=1000){
        parent::__construct($marque, $modele, $annee, $immat, $prixJour);
        $this->capacite = $capacite;
    }

    public function getType(): string {
        return 'camion';
    }

    public function getDescription(): string {
        return "Camion {$this->marque} {$this->modele}, capacité: {$this->capacite} kg, prix/jour: {$this->prixJour} €";
    }

    public function getCaracteristiques(): array {
        return [
            'Type' => 'Camion',
            'Marque' => $this->marque,
            'Modèle' => $this->modele,
            'Année' => $this->annee,
            'Immatriculation' => $this->immat,
            'Capacité' => $this->capacite.' kg',
            'Prix/jour' => $this->prixJour.' €'
        ];
    }
}
?>
