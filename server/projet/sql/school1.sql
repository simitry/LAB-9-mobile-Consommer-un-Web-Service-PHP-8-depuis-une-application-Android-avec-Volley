CREATE DATABASE IF NOT EXISTS school1 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE school1;

CREATE TABLE IF NOT EXISTS Etudiant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    ville VARCHAR(50),
    sexe VARCHAR(10)
);

INSERT INTO Etudiant (nom, prenom, ville, sexe)
SELECT 'Lachgar', 'Mohamed', 'Rabat', 'homme'
WHERE NOT EXISTS (SELECT 1 FROM Etudiant WHERE nom = 'Lachgar' AND prenom = 'Mohamed');

INSERT INTO Etudiant (nom, prenom, ville, sexe)
SELECT 'Safi', 'Amine', 'Marrakech', 'homme'
WHERE NOT EXISTS (SELECT 1 FROM Etudiant WHERE nom = 'Safi' AND prenom = 'Amine');
