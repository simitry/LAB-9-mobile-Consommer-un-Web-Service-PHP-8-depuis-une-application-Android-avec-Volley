<?php

class Etudiant {
    private $id;
    private $nom;
    private $prenom;
    private $ville;
    private $sexe;

    public function __construct($id, $nom, $prenom, $ville, $sexe) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->ville = $ville;
        $this->sexe = $sexe;
    }

    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom; }
    public function getVille() { return $this->ville; }
    public function getSexe() { return $this->sexe; }
}
