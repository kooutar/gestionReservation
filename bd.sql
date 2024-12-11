create table client(
    id_client int(11) AUTO_INCREMENT PRIMARY KEY,
       nom varchar(100) NOT NULL,
       pernom varchar(100) NOT NULL,
       email varchar(150) UNIQUE,
       telephone varchar(150) NOT NULL,
       adresse text NOT NULL,
       date_naissance date NOT NULL
);
CREATE TABLE activite(
      id_activite int(11) AUTO_INCREMENT PRIMARY KEY,
      titre varchar(150) NOT NULL,
       description text NOT NULL ,
       destination varchar(100) NOT NULL,
       prix DECIMAL(10, 2)  NOT NULL,
       dateDebut date NOT NULL,
       dateFin date NOT NULL,
       places_disponibles int(11) NOT NULL
);
CREATE TABLE  reservation(
       id_reservation int(11) AUTO_INCREMENT PRIMARY KEY,
       id_activite int(11) NOT NULL,
       id_client int(11) NOT NULL,
       date_reservation TIMESTAMP ,
       status ENUM('En attente','Confirmée','Annulée') DEFAULT 'En attente',
       FOREIGN KEY (id_client) REFERENCES  client(id_client),
       FOREIGN KEY (id_activite) REFERENCES activite(id_activite)
 );

--  affiche tous les clients
SELECT * FROM client;

-- affiche tous les activities
SELECT * FROM reservation;
-- affiche tous les activite
SELECT * FROM activite;

-- Insertion Client
INSERT INTO activite (titre, description, destination, prix, dateDebut, dateFin, places_disponibles) 
VALUES ("voayage1", "description", "Rabat", 55, "2024-02-20", "2024-03-20", 50);

-- Insertion client
INSERT INTO client (nom, pernom, email, telephone, adresse, date_naissance) 
VALUES ("laajil", "kaoutar", "kaoutar@gmail.com", "0626917903", "ZOUHOUR", "2001-09-08");
-- Insertion reservation
INSERT INTO reservation (id_activite, id_client) VALUES(1,1);
-- ajout colonne to 
ALTER client
ADD CIN varchar(10);

-- supprimmer colonne
ALTER table client
DROP CIN;
-- modifier nom colonne
ALTER table client
CHANGE CIN CIN2 varchar(10) ;

-- mise a jour client
UPDATE activite
SET destination="Paris"
WHERE id_activite=3;
-- mise a jour description activite
update activite
SET description="new description"
WHERE id_activite=1;
-- supprestion d'une reservation
DELETE FROM reservation 
WHERE id_reservation  = 3 
--  jointure
SELECT *
FROM activite
INNER JOIN reservation
ON Client.id_client = reservation.id_client 
WHERE reservation.id_client=3; 