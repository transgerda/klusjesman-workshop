<?php
  require_once('../src/klusjes.php');
  $klusjes = new Klusjes();

  if (isset($_POST['toevoegen'])) {
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $klantId = $_GET['id'];
    $aantalUur = $_POST['aantalUur'];
    $uurKosten = $_POST['uurKosten'];
    $voorrijKosten = $_POST['voorrijKosten'];

    if ($klusjes->klusToevoegen($naam, $omschrijving, $klantId, $aantalUur, $uurKosten, $voorrijKosten))
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
      $('.sidebar').load('sidebar.php');
    })
 </script>
</head>
<body>
  <div class="sidebar"></div>
  <h1>Klus registrate</h1>

  <form method="post">
    <label for="naam">Naam klus: </label>
    <input type="text" name="naam"><br>

    <label for="omschrijving">omschrijving</label>
    <textarea name="omschrijving"></textarea><br>
    <input type="submit" name="toevoegen" value="Toevoegen">
  </form>
</body>
</html>