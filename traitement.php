<?php
//   include('bd.php');
//  if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         $titre=$_POST['Titre'];
//         $destination=$_POST['destination'];
//         $Description=$_POST['Description'];
//         $Prix=$_POST['Prix'];
//         $nbrPlaces=$_POST['nbrPlaces'];
//         $dateDebut=$_POST['dateDebut'];
//         $dateFin=$_POST['dateFin'];
//         if(!empty(trim($titre))&&!empty(trim($Description))&& !empty(trim($destination))&&!empty($Prix)&&!empty($nbrPlaces)&&!empty( $dateDebut)&&!empty($dateFin)&&validationDate( $dateDebut,$dateFin)&&valisationNumber($Prix)&&valisationNumber($nbrPlaces)){
//           $requete = "INSERT INTO activite (titre, description, destination, prix, dateDebut, dateFin, places_disponibles) 
//                         VALUES ('$titre', '$Description', '$destination', $Prix, '$dateDebut', '$dateFin', $nbrPlaces)";
//           $conn->exec( $requete);
        
//         }else{
         
//           echo"vide";
          
//         }
//  }
//   function validationDate($datedebut,$dateFin)
//   {
//     if(($datedebut<=>$dateFin)!=1)
//     {
//       return TRUE;
//     }
//     return False;
    
   
//   }

//   function valisationNumber($number)
//   {
//     if($number>0)
//      return true;
//     return false;
//   }




?>