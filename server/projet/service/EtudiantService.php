<?php

include_once __DIR__ . '/../classes/Etudiant.php';
include_once __DIR__ . '/../connexion/Connexion.php';
include_once __DIR__ . '/../dao/IDao.php';

class EtudiantService implements IDao {
    private $connexion;

    public function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = 'INSERT INTO Etudiant (nom, prenom, ville, sexe)
                  VALUES (:nom, :prenom, :ville, :sexe)';
        $stmt = $this->connexion->getConnexion()->prepare($query);
        $stmt->execute([
            ':nom' => $o->getNom(),
            ':prenom' => $o->getPrenom(),
            ':ville' => $o->getVille(),
            ':sexe' => $o->getSexe()
        ]);
    }

    public function update($o) {
        $query = 'UPDATE Etudiant
                  SET nom = :nom, prenom = :prenom, ville = :ville, sexe = :sexe
                  WHERE id = :id';
        $stmt = $this->connexion->getConnexion()->prepare($query);
        $stmt->execute([
            ':id' => $o->getId(),
            ':nom' => $o->getNom(),
            ':prenom' => $o->getPrenom(),
            ':ville' => $o->getVille(),
            ':sexe' => $o->getSexe()
        ]);
    }

    public function delete($o) {
        $stmt = $this->connexion->getConnexion()->prepare('DELETE FROM Etudiant WHERE id = :id');
        $stmt->execute([':id' => $o->getId()]);
    }

    public function findById($id) {
        $stmt = $this->connexion->getConnexion()->prepare('SELECT * FROM Etudiant WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll() {
        return $this->findAllApi();
    }

    public function findAllApi() {
        $req = $this->connexion->getConnexion()->query('SELECT * FROM Etudiant ORDER BY id DESC');
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
