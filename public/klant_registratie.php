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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.sidebar').load('sidebar.php');
      })
    </script>

<div class="sidebar"></div>

  <form method="post">
    <label class="textAdresNormaal" for="naam">Naam:</label><br>
    <input type="text" name="naam" id="naam"><br>
  
    <label class="textAdresNormaal" for="adres">Telefoonnummer:</label><br>
    <input type="text" name="telefoon_nummer" id="telefoon_nummer"><br>
  
    <label class="textAdresNormaal" for="email">Email-adres:</label><br>
    <input type="email" name="email" id="email"><br>
  
    <label class="textAdresNormaal" for="adres">Adres:</label><br>
    <input type="text" name="adres" id="adres"><br>
    <br>
    <input class="buttonSmall" type="submit" name="toevoegen" value="Toevoegen">
  </form>
  <br>
  <a class="button" href="klant_overzicht.php">Klant overzicht</a>
