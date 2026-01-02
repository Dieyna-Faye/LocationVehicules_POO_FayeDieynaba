<?php
interface Louable {
    public function calculerPrixLocation(int $jours): float;
    public function estDisponible(): bool;
    public function getDescription(): string;
}
?>
