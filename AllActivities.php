
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <style>
 
</style>
</head>
<body style="background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);" class=" ">
<?php
include('bd.php');
      if(isset($_GET['id']))
      {
        
            $id = intval($_GET['id']); 
            $query = "SELECT titre FROM activite WHERE id_activite = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                echo $row['titre'];
            } else {
                echo "pas d'activite.";
            }
    }
      ?>


<?php
 $regex="/@gmail.com$/";
 $regex2 = "/^[0-9]{10}$/";
   $nomclientErr="";
   $prenomclientErr="";
   $mailclientErr="";
   $telephoneclientErr="";
   $adresseclientErr="";
   $dateNaissanceErr="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idACtivite=$_POST['id'];
        $nom=$_POST['nom'];
        $pernom=$_POST['pernom'];
        $email=$_POST['email'];
        $telephone=$_POST['telephone'];
        $adresse=$_POST['adresse'];
        $dateNaissance=$_POST['dateNaissance'];
        if(!empty(trim($nom))&&!empty(trim($pernom))&&!empty(trim($email))&&!empty(trim($telephone))&&!empty(trim($adresse))&&!empty(trim($dateNaissance))){
            $queryClient = "INSERT INTO client (nom, pernom, email, telephone, adresse, date_naissance) 
            VALUES (?, ?, ?, ?, ?, ?)";
            $stmtClient = mysqli_prepare($conn, $queryClient);
            mysqli_stmt_bind_param($stmtClient, "ssssss", $nom, $pernom, $email, $telephone, $adresse, $dateNaissance);
            mysqli_stmt_execute($stmtClient);
            $idClient = mysqli_insert_id($conn);
            $queryInsertionReserv="INSERT INTO reservation (id_activite, id_client) VALUES($idACtivite,$idClient) ;";
            $resevequery=mysqli_query($conn,$queryInsertionReserv); 
        }else{
            if(empty(trim($nom)))
            {
                $nomclientErr="nom ne doit pas etre vide";
            }
            if(empty(trim($pernom)))
            {
                $prenomclientErr="prenom ne doit pas etre vide";
            }
            if(empty(trim($email))|| !preg_match($regex,$email))
            {
            
               
                $mailclientErr="mail invalide";
            }
            if(empty(trim($telephone))||!preg_match($regex2,$telephone) )
            {
                $telephoneclientErr="telephonne invalide";
            }
            if(empty(trim($adresse)))
            {
                $adresseclientErr="adresse ne doit pas etre vide";
            }
            if(empty(trim($dateNaissance)))
            {
                $dateNaissanceErr="date Naissance  ne doit pas etre vide";
            }

        }
             
  }
?>
 
   <div id="modaleInscription" class="flex justify-center items-center bg-black/50 fixed z-50 w-full h-full hidden ">
    <form class="p-6 bg-white w-[350px] md:w-1/2 "  action="AllActivities.php" method="POST">
   <div class="flex items-start justify-between md:p-5 border-b ">
                <h3 class="text-gray-900 text-sm md:text-xl lg:text-2xl font-semibold ">
                   Reserver une place
                </h3>
                <button id="closeBteForListPlayers" type="button" class="closeBte text-gray-400  hover:bg-gray-200  rounded-lg p-5  ">
                    &times;
                </button>
            </div>
					<div class="-mx-3 flex flex-wrap">
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
                                nom
								</label>
								<input type="text" name="nom" id="Titre"
									class="w-full rounded-md border border-[#e0e0e0] bg-white md:py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                      
							</div>
						</div>
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
                                pernom
								</label>
								<input type="text" name="pernom" id="destination"
									class="w-full rounded-md border border-[#e0e0e0] bg-white  md:py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    
							</div>
						</div>
					</div>
					
					<div class="-mx-3 flex flex-wrap">
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label class="mb-3 block text-base font-medium text-[#07074D]">
                                email
								</label>
								<input type="text" name="email" id="dateDebut"
									class="w-full rounded-md border border-[#e0e0e0] bg-white  md:py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    
							</div>
						</div>
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
                                telephone
								</label>
								<input type="text" name="telephone" id="dateFin"
									class="w-full rounded-md border border-[#e0e0e0] bg-white  md:py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    
                                </div>
						</div>
					</div>
		
					<div class="-mx-3 flex flex-wrap">
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
                                adresse
								</label>
								<input type="text" name="adresse" id="Prix"
									class="w-full rounded-md border border-[#e0e0e0] bg-white  md:py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                   
                                </div>
						</div>
						<div class="w-full px-3 sm:w-1/2">
							<div class="mb-5">
								<label  class="mb-3 block text-base font-medium text-[#07074D]">
                                date naissance
								</label>
								<input type="date" name="dateNaissance" id="nbrPlaces"
									class="w-full rounded-md border border-[#e0e0e0] bg-white  md:py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    
                                </div>
						</div>
					</div>
		            <input id="idInput" type="text" name="id"  value="" class="invisible">
					<div>
						<button id="bteReserver" 
							class="hover:shadow-form w-full rounded-md bg-[#6A64F1]  md:py-3 px-8 text-center text-base font-semibold text-white outline-none">
							Reserver
						</button>
					</div>
		</form> 
   </div>
  <div class="">
    <img src="images/logo.png" alt="" class="w-32">
    <div id="err" class="flex flex-col gap-2">
            <div class="text-red-500"><?php echo $nomclientErr;?></div>  
            <div class="text-red-500"><?php echo $prenomclientErr;?></div> 
            <div class="text-red-500"><?php echo $mailclientErr;?></div> 
            <div class="text-red-500"><?php echo $telephoneclientErr;?></div> 
            <div class="text-red-500"><?php echo $adresseclientErr;?></div> 
            <div class="text-red-500"><?php echo $dateNaissanceErr;?></div> 
    </div>
    <section class="grid grid-cols-2 gap-2  p-1 w-full md:p-6 md:grid md:grid-cols-4" > 
        <?php
        $arraySrcImage=['images/image1.jpg','images/image2.jpg','images/image3.jpg','images/image4.jpg'];
        $query="SELECT * FROM activite;";
        $result=mysqli_query($conn,$query);
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($results as $row) {
        echo "
        <div class='rounded-lg bg-white p-4 md:p-6 text-surface shadow-secondary-1 flex flex-col'>
  <img src='{$arraySrcImage[rand(0,3)]}'>
  <div class='flex justify-between'>
  <h5 class='mb-2 text-sm md:text-xl font-medium leading-tight'>{$row['destination']}</h5>
  <h5 class='mb-2 text-sm md:text-xl font-medium leading-tight'>{$row['prix']}DH</h5>
  
  </div>
  <p class='mb-2  text-sm md:text-base'>De {$row['dateDebut']} à {$row['dateFin']}</p>
  <p class='mb-4 text-base'>
    {$row['description']}
  </p>
      <button id='{$row['id_activite']}' data-id='{$row['id_activite']}' class='bteReservation py-3 text-white font-semibold rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105' style='background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);'>Reserver</button>
</div>
        ";
    }
        ?>

    </section>
    </div>
   <script>
    let id_activite;
    const buttons= document.querySelectorAll('.bteReservation');
    buttons.forEach(button => {
     button.addEventListener('click',()=>{
       
        console.log(button.id);
         id_activite=button.id;
         document.querySelector('#idInput').value=id_activite;
         document.querySelector('#modaleInscription').classList.remove('hidden');
     })
    });
    
   

    document.querySelector('#bteReserver').addEventListener('click',()=>{

      console.log(document.querySelector('#idInput').value) 
    })
    
    document.querySelector('#closeBteForListPlayers').addEventListener('click',()=>{
        document.querySelector('#modaleInscription').classList.add('hidden');
    })
    </script> 
	 
   
</body>
</html>
