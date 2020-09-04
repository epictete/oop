<?php

class Voiture
{
    // Properties
    private $numero_immatriculation;
    private $mise_en_circulation;
    private $kilometrage;
    private $modele;
    private $marque;
    private $couleur;
    private $poids;
    private $usure;
    private $img_src;

    // Constructor
    public function __construct($numero_immatriculation, $mise_en_circulation, $kilometrage, $modele, $marque, $couleur, $poids, $img_src)
    {
        $this->numero_immatriculation = $numero_immatriculation;
        $this->mise_en_circulation = $mise_en_circulation;
        $this->kilometrage = $kilometrage;
        $this->modele = $modele;
        $this->marque = $marque;
        $this->couleur = $couleur;
        $this->poids = $poids;
        $this->usure = $this->usure();
        $this->img_src = $img_src;
    }

    public function statut()
    {
        return $this->marque == 'Audi' ? 'Reserved' : 'Free';
    }

    public function categorie()
    {
        return $this->poids > 3500 ? 'Utilitaire' : 'Voiture';
    }

    public function origine()
    {
        $id = substr($this->numero_immatriculation, 0, 2);
        switch ($id)
        {
            case 'BE':
                $this->origine = 'Belgique';
                break;
            case 'FR':
                $this->origine = 'France';
                break;
            case 'DE':
                $this->origine = 'Allemagne';
                break;
            default:
                $this->origine = 'Autre';
        }
        return $this->origine;
    }

    public function usure()
    {
        if ($this->kilometrage < 100000)
        {
            return $this->usure = 'Low';
        }
        else if ($this->kilometrage >= 100000 && $this->kilometrage < 200000)
        {
            return $this->usure = 'Middle';
        }
        else
        {
            return $this->usure = 'High';
        }
    }

    public function age()
    {
        $start = new DateTime($this->mise_en_circulation);
        $now = new DateTime;
        $intvl = $start->diff($now);
        return $intvl->y . " an(s), " . $intvl->m." mois et ".$intvl->d." jour(s)";
    }

    public function maj_km($km)
    {
        $this->kilometrage = $km;
        return $this->kilometrage . " kms.<br>Le nouveau niveau d'usure est: " . $this->usure();
    }

    public function rouler()
    {
        $this->kilometrage += 100000;
        $this->usure = 'High';
    }

    public function display()
    {
        $props = ['marque', 'modele', 'couleur', 'kilometrage', 'numero_immatriculation', 'poids', 'mise_en_circulation'];

        echo '<table><tbody>';
        echo '<img src="./img/' . $this->img_src . '.jpg">';

        foreach( $props as $prop)
        {
            echo '<tr><td>';
            echo $this->$prop . '<br>';
            echo '</td></tr>';
        }

        echo '</tbody></table>';
    }
}

?>