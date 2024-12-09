
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Slide Navbar</title>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
	<header>
		<span>LOGO</span>
	</header>
  <section class="flex h-[800px] ">
    <div class="bg-gray-50 w-[200px] h-full flex flex-col gap-6 p-6 justify-center">
      <button id="Clients" class="py-3 text-white font-semibold rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105" style="background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);">Clients</button>
	  <button id="reservation" class="py-3 text-white font-semibold rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105" style="background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);">reservation</button>
	  <button id="activite" class="py-3 text-white font-semibold rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105" style="background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);">activite</button>
	  
	</div>
    <div class="w-full h-full  flex flex-col gap-6 p-6" style="background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);">
       <!-- <H1 class="text-center text-white uppercase tracking-wider"> Show ALL Clients</H1> -->
	   <table id="tableClients" class="table min-w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
		 <H1 class="text-center text-white uppercase tracking-wider"> Show ALL Clients</H1>
		<thead>
			<tr class="bg-gray-100 text-gray-600 text-left">
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">id</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">Nom</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">prenom</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">mail</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">telephone</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">adresse</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">date de naissance</th>
			</tr>
		</thead>
		<tbody>
			<!-- Ligne de données -->
			<tr class="hover:bg-gray-50">
				<td class="py-3 px-4 text-sm text-gray-700">1</td>
				<td class="py-3 px-4 text-sm text-gray-700">Yoga</td>
				<td class="py-3 px-4 text-sm text-gray-700">Alice Dupont</td>
				<td class="py-3 px-4 text-sm text-gray-700">2024-12-06</td>
				<td class="py-3 px-4 text-sm text-gray-700">Confirmée</td>
				<td class="py-3 px-4 text-sm text-gray-700">Confirmée</td>
				<td class="py-3 px-4 text-sm text-gray-700">Confirmée</td>
			</tr>
			<!-- Autres lignes de données -->
			
		</tbody>
	</table>
	<table id="tableReservation" class="table min-w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden hidden">
		<thead>
			<tr class="bg-gray-100 text-gray-600 text-left">
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">kaoutar</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">Nom</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">prenom</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">mail</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">telephone</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">adresse</th>
				<th class="py-3 px-4 font-medium text-sm uppercase tracking-wider">date de naissance</th>
			</tr>
		</thead>
		<tbody>
			<!-- Ligne de données -->
			<tr class="hover:bg-gray-50">
				<td class="py-3 px-4 text-sm text-gray-700">1</td>
				<td class="py-3 px-4 text-sm text-gray-700">Yoga</td>
				<td class="py-3 px-4 text-sm text-gray-700">Alice Dupont</td>
				<td class="py-3 px-4 text-sm text-gray-700">2024-12-06</td>
				<td class="py-3 px-4 text-sm text-gray-700">Confirmée</td>
				<td class="py-3 px-4 text-sm text-gray-700">Confirmée</td>
				<td class="py-3 px-4 text-sm text-gray-700">Confirmée</td>
			</tr>
			<!-- Autres lignes de données -->
			
		</tbody>
	</table>

	<div id="tableactivite" class="table flex flex flex-col w-full  hidden">
		<div class="flex justify-end"><button id="showAllActivites" class="text-white" >show All Activite</button></div>
		<div class="flex items-center justify-center">
			<!-- Author: FormBold Team -->
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
							</div>
						</div>
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
									destination
								</label>
								<input type="text" name="destination" id="destination"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
							</div>
						</div>
					</div>
					<div class="mb-5">
						<label  class="mb-3 block text-base font-medium text-[#07074D]">
							Description
						</label>
						<textarea name="Description" id="Description" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" ></textarea>
					</div>
					<div class="-mx-3 flex flex-wrap">
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label class="mb-3 block text-base font-medium text-[#07074D]">
									Date de debut
								</label>
								<input type="date" name="dateDebut" id="dateDebut"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
							</div>
						</div>
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
									date de fin
								</label>
								<input type="date" name="dateFin" id="dateFin"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
							</div>
						</div>
					</div>
		
					<div class="-mx-3 flex flex-wrap">
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
									prix
								</label>
								<input type="number" name="Prix" id="Prix"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
							</div>
						</div>
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
									numbre of places
								</label>
								<input type="number" name="nbrPlaces" id="nbrPlaces"
									class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
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
				<?php
				 include('bd.php');
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
						  $conn->exec( $requete);
						
						}else{
						 
						  echo "
						   <script>
						    alert('vide')
						   </script> 
						  ";
						  
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
				
				?>
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
  </script>
</body>
</html>