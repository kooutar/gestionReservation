
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body style="background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);" class="p-6">
    <section class="grid grid-cols-4 gap-6  w-full" > 
        <?php
        $arraySrcImage=['images/image1.jpg','images/image2.jpg','images/image3.jpg','images/image4.jpg'];
         include('bd.php');
         $stetemnt=$conn->query("SELECT * FROM activite; ");
    while ($row = $stetemnt->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <div
  class='rounded-lg bg-white p-6 text-surface shadow-secondary-1 flex flex-col'>
  <img src='{$arraySrcImage[rand(0,3)]}'>
  <div class='flex justify-between'>
  <h5 class='mb-2 text-xl font-medium leading-tight'>{$row['destination']}</h5>
  <h5 class='mb-2 text-xl font-medium leading-tight'>{$row['prix']}DH</h5>
  
  </div>
  <p class='mb-2 text-base'>De {$row['dateDebut']} à {$row['dateFin']}</p>
  <p class='mb-4 text-base'>
    {$row['description']}
  </p>
      <button  class='py-3 text-white font-semibold rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105' style='background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);'>Reserver</button>
</div>
        ";
    }

        ?>
    <!-- </table> -->
    </section>
</body>
</html>
