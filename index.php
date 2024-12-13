
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Slide Navbar</title>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
				 include('bd.php');
				  $titreERR="";
				  $destinationERR="";
				  $DescriptionERR="";
				  $PrixERR="";
				  $nbrPlacesERR="";
				  $dateDebutERR="";
				  $dateFinERR="";
				  $validationdateERR="";
				 if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$titre=$_POST['Titre'];
						$destination=$_POST['destination'];
						$Description=$_POST['Description'];
						$Prix=$_POST['Prix'];
						$nbrPlaces=$_POST['nbrPlaces'];
						$dateDebut=$_POST['dateDebut'];
						$dateFin=$_POST['dateFin'];
						if(!empty(trim($titre))&&!empty(trim($Description))&& !empty(trim($destination))&&!empty($Prix)&&!empty($nbrPlaces)&&!empty( $dateDebut)&&!empty($dateFin)&&validationDate( $dateDebut,$dateFin)&&valisationNumber($Prix)&&valisationNumber($nbrPlaces)){
						  $requete = "INSERT INTO activite (titre, description, destination, prix, dateDebut, dateFin, places_disponibles) 
										VALUES ('$titre', '$Description', '$destination', $Prix, '$dateDebut', '$dateFin', $nbrPlaces)";
						//   $conn->exec( $requete);
						mysqli_query($conn,$requete);
						
						}else{
						 if(empty(trim($titre)))
						 {
						$titreERR="titre est vide";
						 }
						 if(empty(trim($Description)))
						 {
						$DescriptionERR="Description est vide";
						 }
						 if(empty(trim($destination)))
						 {
						$destinationERR="Description est vide";
						 }
						 if(empty(trim($Prix)) || valisationNumber($Prix))
						 {
						$PrixERR="Prix ne doit pas etre vide ou negative";
						 }
						 if(empty(trim($nbrPlaces)) || valisationNumber($nbrPlaces))
						 {
						$nbrPlacesERR="nbr de place ne doit etre vide ou negative";
						 }
						 if(empty(trim($dateFin)))
						 {
						   $dateFinERR="la date est vide";
						 }
						 if(empty(trim($dateDebut))||dateToday($dateDebut))
						 {
						   $dateDebutERR="la date est vide";
						 }
						 if(!empty(trim($dateDebut))&&!empty(trim($dateFin)))
						  if(validationDate($dateDebut,$dateFin))
						  {
							$validationdateERR="date fin doit superieur de date debut";
						  }
						}
				 }
				  function validationDate($datedebut,$dateFin)
				  {
					if(($datedebut<=>$dateFin)!=1)
					{
					  return TRUE;
					}
					return False;
				  }
				
				  function valisationNumber($number)
				  {
					if($number>0)
					   return true;
					return false;
				  }
				  function dateToday($dateDebut)
				  {
                    $dateToday=date('D/M/Y');
					if(($dateDebut<=>$dateToday)==1)
					   return true;
					return false;
				  }
				
				?>
  <section class=" block md:flex md:h-[800px] ">
 <div >
   <img src="images/logo.png" alt="" class="w-32">
	
    <div class="bg-gray-50  w-full md:w-[200px] md:mt-[200px]  flex md:flex-col gap-6 p-6 justify-center">
      <button id="Clients" class="px-3 py-3 text-white font-semibold rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105" style="background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);">Clients</button>
	  <button id="reservation" class="px-3 py-3 text-white font-semibold rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105" style="background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);">reservation</button>
	  <button id="activite" class="px-3 py-3 text-white font-semibold rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105" style="background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);">activite</button>
	  
	</div>
	</div>
    <div class="w-full h-full  flex flex-col gap-6 p-6" style="background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);">
	   <div class="overflow-x-auto">
  <table id="tableClients" class="table min-w-[200px] md:min-w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden hidden">
    
	
	
    
    <thead>
      <tr class="bg-gray-100 text-gray-600 text-left">
        <th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">ID</th>
        <th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">Nom</th>
        <th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">Prénom</th>
        <th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">Mail</th>
        <th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">Téléphone</th>
        <th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">Adresse</th>
        <th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">Date de Naissance</th>
		<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">Supprimer</th>
      </tr>
    </thead>

    <tbody>
      <?php
      include('bd.php');
      $query = "SELECT * FROM client";
      $result = mysqli_query($conn, $query);

      if ($result) {
          // Parcourir les résultats
          while ($client = mysqli_fetch_assoc($result)) {
              echo "
              <tr class='hover:bg-gray-50'>
                  <td class='py-3 px-4 text-sm text-gray-700'>{$client['id_client']}</td>
                  <td class='py-3 px-4 text-sm text-gray-700'>{$client['nom']}</td>
                  <td class='py-3 px-4 text-sm text-gray-700'>{$client['pernom']}</td>
                  <td class='py-3 px-4 text-sm text-gray-700'>{$client['email']}</td>
                  <td class='py-3 px-4 text-sm text-gray-700'>{$client['telephone']}</td>
                  <td class='py-3 px-4 text-sm text-gray-700'>{$client['adresse']}</td>
                  <td class='py-3 px-4 text-sm text-gray-700'>{$client['date_naissance']}</td>
				  <td class='py-3 px-4 text-sm text-gray-700'><button class='btesupprimerClient' id='{$client['id_client']}'><i class='ri-delete-bin-6-line'></button></i></td>
              </tr>
              ";
          }
      }
      ?>
    </tbody>
  </table>
</div>


	<table id="tableReservation" class="table min-w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden hidden">
		<thead>
			<tr class="bg-gray-100 text-gray-600 text-left">
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">Titre </th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">Nom</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">Status</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">supprimer</th>
			</tr>
		</thead>
		<tbody>
		  <?php
		  $requete="SELECT reservation.id_reservation, activite.titre, client.nom, reservation.status
					FROM activite
					INNER JOIN reservation ON activite.id_activite = reservation.id_activite
					INNER JOIN client ON client.id_client = reservation.id_client;
 ";
		 $result= mysqli_query($conn, $requete);
		 if ($result) {
			while($reservation = mysqli_fetch_assoc($result)){
			echo" <tr class='hover:bg-gray-50'>
			 	<td class='py-3 px-4 text-sm text-gray-700'>{$reservation['titre']}</td>
			 	<td class='py-3 px-4 text-sm text-gray-700'>{$reservation['nom']}</td>
			 	<td class='py-3 px-4 text-sm text-gray-700'>{$reservation['status']}</td>
				<td class='py-3 px-4 text-sm text-gray-700'><button class='bteSupprimeresrvation' id='{$reservation['id_reservation']}'><i class='ri-delete-bin-6-line'></button></i></td>
			    </tr>
			 ";
			}
		 }
			?>
			
		</tbody>
	</table>

	<div id="tableactivite" class="table flex flex flex-col w-full  ">
		<div class="flex justify-end"><button id="showAllActivites" class="hover:shadow-form mb-2 rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">show All Activite</button></div>
		<div class="flex items-center justify-center">
			<div class="mx-auto w-full max-w-[550px] bg-white">
				<form class="p-6" action="index.php" method="post">
					<div class="-mx-3 flex flex-wrap">
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
									titre
								</label>
								<input type="text" name="Titre" id="Titre"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
									<span class="text-red-500">
										<?php echo $titreERR?>
									</span>
							</div>
						</div>
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
									destination
								</label>
								<input type="text" name="destination" id="destination"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
									<span class="text-red-500">
										<?php echo $destinationERR?>
									</span>
							</div>
						</div>
					</div>
					<div class="mb-5">
						<label  class="mb-3 block text-base font-medium text-[#07074D]">
							Description
						</label>
						<textarea name="Description" id="Description" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" ></textarea>
						<span class="text-red-500">
						<?php echo $DescriptionERR?>
					</span>
					</div>
					
					<div class="-mx-3 flex flex-wrap">
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label class="mb-3 block text-base font-medium text-[#07074D]">
									Date de debut
								</label>
								<input type="date" name="dateDebut" id="dateDebut"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
									<span class="text-red-500">
						              <?php echo $dateDebutERR?>
					                </span>
							</div>
						</div>
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
									date de fin
								</label>
								<input type="date" name="dateFin" id="dateFin"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
									<span class="text-red-500">
						              <?php echo $dateFinERR?>
					                </span>
							</div>
						</div>
					</div>
					<span class="text_center text-red-500"><?php echo $validationdateERR ?></span>
		
					<div class="-mx-3 flex flex-wrap">
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
									prix
								</label>
								<input type="number" name="Prix" id="Prix"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
									<span class="text-red-500">
						              <?php echo $PrixERR?>
					                </span>
							</div>
						</div>
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
									numbre of places
								</label>
								<input type="number" name="nbrPlaces" id="nbrPlaces"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
									<span class="text-red-500"><?php echo $nbrPlacesERR?></span>
							</div>
							
						</div>
					</div>
		
					<div>
						<button
							class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
							save
						</button>
					</div>
				</form>
			
			</div>
		</div>
</div>

	
  </section>
  <script>
   document.querySelector('#reservation').addEventListener('click',()=>{
	let table=document.querySelectorAll('.table');
	 table.forEach(table=>{
	     if(table.id!="tableReservation")
		 {
			table.classList.add('hidden')
		 }else{
			table.classList.remove('hidden')
		 }
		 
	 })
	
   })
   document.querySelector('#Clients').addEventListener('click',()=>{
	let table=document.querySelectorAll('.table');
	 table.forEach(table=>{
	     if(table.id!="tableClients")
		 {
			table.classList.add('hidden')
		 }else{
			table.classList.remove('hidden')
		 }
		 
	 })
	
   })
   document.querySelector('#activite').addEventListener('click',()=>{
	let table=document.querySelectorAll('.table');
	 table.forEach(table=>{
	     if(table.id!="tableactivite")
		 {
			table.classList.add('hidden')
		 }else{
			table.classList.remove('hidden')
		 }
		 
	 })
	
   })
   document.querySelector('#showAllActivites').addEventListener('click',()=>{
	window.location.href="AllActivities.php";
   })

   const btesupprime = document.querySelectorAll('.bteSupprimeresrvation');

btesupprime.forEach(button => {
  button.addEventListener('click', () => {
    let idbutton = button.id;
	window.location.href = "index.php?idresrvation=" + idbutton;
  });
});

const btesupprimerClient = document.querySelectorAll('.btesupprimerClient');

btesupprimerClient.forEach(button => {
  button.addEventListener('click', () => {
    let idbutton = button.id;
	window.location.href = "index.php?idclient=" + idbutton;
  });
});
  </script>
  <?php
   if (isset($_GET['idresrvation'])) {
    $idreservation = $_GET['idresrvation'];
    $requte="DELETE FROM reservation WHERE id_reservation  = $idreservation ";
	mysqli_query($conn, $requte);
}
  
if (isset($_GET['idclient'])) {
    $idclient = $_GET['idclient'];
    $requte="DELETE FROM client WHERE id_client  = $idclient ";
	mysqli_query($conn, $requte);
}
else{
	echo 'pas';
}
  ?>
</body>
</html>