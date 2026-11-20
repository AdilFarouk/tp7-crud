CREATE DATABASE tp7_crud CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE tp7_crud;

CREATE TABLE formation (
    id_formation INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    duree INT NOT NULL,
    niveau VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE etudiant (
    id_etudiant INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    id_formation INT NOT NULL,
    FOREIGN KEY (id_formation) REFERENCES formation(id_formation)
        ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE module (
    id_module INT AUTO_INCREMENT PRIMARY KEY,
    intitule VARCHAR(100) NOT NULL,
    volume_horaire INT NOT NULL,
    id_formation INT NOT NULL,
    FOREIGN KEY (id_formation) REFERENCES formation(id_formation)
        ON DELETE RESTRICT
) ENGINE=InnoDB;

-- Données de test
INSERT INTO formation (titre, duree, niveau) VALUES
('Développement Web', 12, 'Licence'),
('Réseaux et Sécurité', 10, 'Licence');

INSERT INTO etudiant (nom, prenom, email, id_formation) VALUES
('Alami', 'Sara', 'sara@mail.com', 1),
('Bennani', 'Omar', 'omar@mail.com', 2);

INSERT INTO module (intitule, volume_horaire, id_formation) VALUES
('PHP et MySQL', 40, 1),
('Administration Linux', 30, 2);