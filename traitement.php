<?php
  include('bd.php');
  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //   foreach ($_POST as $key => $value) {
  //      $requeteInsertion="INSERT INTO activite VALUES() ";
  //       echo htmlspecialchars($key) . ": " . htmlspecialchars($value) . "<br>";
  //   }
// }

$titre=$_POST['Titre'];
$destination=$_POST['destination'];
$Description=$_POST['Description'];
$Prix=$_POST['Prix'];
$nbrPlaces=$_POST['nbrPlaces'];
$dateDebut=$_POST['dateDebut'];
$dateFin=$_POST['dateFin'];
if(!empty($titre)&&!empty($Description)&&!empty($Prix)&&!empty($nbrPlaces)&&!empty($dateFin)){
  $requete = "INSERT INTO activite (titre, description, destination, prix, dateDebut, dateFin, places_disponibles) 
                VALUES ('$titre', '$Description', '$destination', $Prix, '$dateDebut', '$dateFin', $nbrPlaces)";
  $conn->exec( $requete);

  // header('location:index.html');
}else{
  
  
  
}


// $allActivites = "SELECT * FROM activite";
// $stement=$conn->query($allActivites);
// if ($stement->rowCount() > 0) {
//   // Récupérer tous les résultats sous forme de tableau associatif
//   $activites = $stement->fetchAll(PDO::FETCH_ASSOC);

//   // Affichage des résultats
//   foreach ($activites as $activite) {
//       echo "ID: " . $activite['id_activite'] . "<br>";
//       echo "Titre: " . $activite['titre'] . "<br>";
//       echo "Description: " . $activite['description'] . "<br>";
//       echo "Destination: " . $activite['destination'] . "<br>";
//       echo "Prix: " . $activite['prix'] . "<br>";
//       echo "Date Début: " . $activite['dateDebut'] . "<br>";
//       echo "Date Fin: " . $activite['dateFin'] . "<br>";
//       echo "Places Disponibles: " . $activite['places_disponibles'] . "<br><br>";
//   }
// } else {
//   echo "Aucune activité trouvée.";
// }
?>