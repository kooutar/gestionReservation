<?php
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "testphp";     
$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";

try {

    $conn = new PDO($dsn, $username, $password);


    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    
      $query1 ="
      CREATE TABLE IF NOT EXISTS client(
       id_client int(11) AUTO_INCREMENT PRIMARY KEY,
       nom varchar(100) NOT NULL,
       pernom varchar(100) NOT NULL,
       email varchar(150) UNIQUE,
       telephone varchar(150) NOT NULL,
       adresse text NOT NULL,
       date_naissance date NOT NULL
        )
      ";
      $query2 ="
      CREATE TABLE IF NOT EXISTS activite(
      id_activite int(11) AUTO_INCREMENT PRIMARY KEY,
      titre varchar(150) NOT NULL,
       description text NOT NULL ,
       destination varchar(100) NOT NULL,
       prix DECIMAL(10, 2)  NOT NULL,
       dateDebut date NOT NULL,
       dateFin date NOT NULL,
       places_disponibles int(11) NOT NULL
        )
      ";
    
      $query3 ="
      CREATE TABLE IF NOT EXISTS reservation(
       id_reservation int(11) AUTO_INCREMENT PRIMARY KEY,
       id_activite int(11) NOT NULL,
       id_client int(11) NOT NULL,
       date_reservation TIMESTAMP ,
       status ENUM('En attente','Confirmée','Annulée') DEFAULT 'En attente',
       FOREIGN KEY (id_client) REFERENCES  client(id_client),
       FOREIGN KEY (id_activite) REFERENCES activite(id_activite)
        )
      ";
      $stmt1 = $conn->query($query1);
      $stmt2 = $conn->query($query2);
      $stmt3 = $conn->query($query3);
     
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

?>