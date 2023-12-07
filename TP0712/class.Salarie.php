
<?php

// <!-- // Salarie.php  -->

class Salarie extends Personne {
    
        // <!-- // -- Propriétés -->

    private $salaire;

        // <!-- // -- Méthodes -->

    public function __set($propriete, $valeur) {
        switch ($propriete) {
            case 'salaire':
                $this->salaire = $valeur;
                break;
        }
    }

    public function __get($propriete) {
        switch ($propriete) {
            case 'salaire':
                return $this->salaire;
                break;
        }
    }

    public function getInfos() {
        return $this->nom . ' a ' . $this->age . ' ans et gagne ' . $this->salaire . ' euros.';
    }

    // <!-- // -- Constructeur -->

    public function __construct($nom, $age, $salaire) {
        parent::__construct($nom, $age);
        $this->salaire = $salaire;
    }



}