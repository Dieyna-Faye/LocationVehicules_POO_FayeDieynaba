<?php
require_once __DIR__ . '/interface/Louable.php';

abstract class Vehicule implements Louable {
    protected $marque;
    protected $modele;
    protected $annee;
    protected $immat;
    protected $prixJour;
    protected $disponible;

    public function __construct($marque, $modele, $annee, $immat, $prixJour){
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->immat = $immat;
        $this->prixJour = $prixJour;
        $this->disponible = true;
    }

    abstract public function getType(): string;

   
    public function calculerPrixLocation(int $jours): float {
        return $this->prixJour * $jours;
    }

    public function estDisponible(): bool {
        return $this->disponible;
    }

    abstract public function getDescription(): string;
    abstract public function getCaracteristiques(): array;

    public function getMarque() {
        return $this->marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function getPrixJour() {
        return $this->prixJour;
    }

    public function getImmat() {
        return $this->immat;
}

}
?>
