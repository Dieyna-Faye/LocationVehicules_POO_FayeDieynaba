<?php
require_once __DIR__ . '/Vehicule.php';

class Voiture extends Vehicule {
    private $nombrePortes;
    private $typeCarburant;

    public function __construct($marque, $modele, $annee, $immat, $prixJour, $nombrePortes=5, $typeCarburant='Essence'){
        parent::__construct($marque, $modele, $annee, $immat, $prixJour);
        $this->nombrePortes = $nombrePortes;
        $this->typeCarburant = $typeCarburant;
    }

    public function getType(): string {
        return 'voiture';
    }

    public function getDescription(): string {
        return "Voiture {$this->marque} {$this->modele}, {$this->nombrePortes} portes, carburant: {$this->typeCarburant}, prix/jour: {$this->prixJour} €";
    }

    public function getCaracteristiques(): array {
        return [
            'Type' => 'Voiture',
            'Marque' => $this->marque,
            'Modèle' => $this->modele,
            'Année' => $this->annee,
            'Immatriculation' => $this->immat,
            'Portes' => $this->nombrePortes,
            'Carburant' => $this->typeCarburant,
            'Prix/jour' => $this->prixJour.' €'
        ];
    }
}
?>
