<?php
    require_once('../src/klant.php');

    $klant = new Klant();

    if (isset($_POST['toevoegen'])) {
      $naam = $_POST['naam'];
      $email = $_POST['email'];
      $adres = $_POST['adres'];
      $telefoon_nummer = $_POST['telefoon_nummer'];

      if ($klant->insertKlant($naam, $email, $adres, $telefoon_nummer)) 
        header('location: klant_overzicht.php');
    }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.sidebar').load('sidebar.html');
    })
  </script>
</head>
<body>
  <div class="sidebar"></div>
  <form method="post">
    <label for="naam">Naam:</label><br>
    <input type="text" name="naam" id="naam"><br>
  
    <label for="adres">Telefoonnummer:</label><br>
    <input type="text" name="telefoon_nummer" id="telefoon_nummer"><br>
  
    <label for="email">Email-adres:</label><br>
    <input type="email" name="email" id="email"><br>
  
    <label for="adres">Adres:</label><br>
    <input type="text" name="adres" id="adres"><br>

    <input type="submit" name="toevoegen" value="Toevoegen">
  </form>
  
  <a href="klant_overzicht.php">Klant overzicht</a>
</body>
</html>
