<?php

class Voiture
{
    // Properties
    // private $immatriculation;
    // private $circulation;
    // private $km;
    // private $modele;
    // private $marque;
    // private $couleur;
    // private $poids;

    // private $statut;
    // private $cat;

    // Constructor
    public function __construct($marque, $poids, $immatriculation)
    {
        // $immatriculation, $circulation, $km, $modele, $marque, $couleur, $poids

        $this->immatriculation = $immatriculation;
        // $this->circulation = $circulation;
        // $this->km = $km;
        // $this->modele = $modele;
        $this->marque = $marque;
        // $this->couleur = $couleur;
        $this->poids = $poids;

        $this->statut = $this->marque == 'Audi' ? 'Reserved' : 'Free';
        $this->cat = $this->poids > 3500 ? 'Utilitaire' : 'Voiture';
        $this->origine = strpos($this->immatriculation, 'BE') == 0 ? 'Belgique' : null;
    }
}

$voiture = new Voiture('Audi', 2000, 'BE1234');

echo '<pre>';
var_dump($voiture->origine);
echo '</pre>';

?>