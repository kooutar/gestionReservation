
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <table class="w-full border-[ border-solid">
        <tr>
            <td>Titre</td>
            <td>Description</td>
            <td>Destination</td>
            <td>Prix</td>
            <td>date de debut</td>
            <td>date fin</td>
            <td>nbr places</td>
</tr>
 
        <?php
         include('bd.php');
         $stetemnt=$conn->query("SELECT * FROM activite; ");
    while ($row = $stetemnt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td class='py-3 px-4 text-sm text-gray-700'>{$row['titre']}</td>
                <td class='py-3 px-4 text-sm text-gray-700'>{$row['description']}</td>
                <td class='py-3 px-4 text-sm text-gray-700'>{$row['destination']}</td>
                <td class='py-3 px-4 text-sm text-gray-700'>{$row['prix']}</td>
                <td class='py-3 px-4 text-sm text-gray-700'>{$row['dateDebut']}</td>
                <td class='py-3 px-4 text-sm text-gray-700'>{$row['dateFin']}</td>
                <td class='py-3 px-4 text-sm text-gray-700'>{$row['places_disponibles']}</td>
              </tr>";
    }

        ?>
    </table>

</body>
</html>
