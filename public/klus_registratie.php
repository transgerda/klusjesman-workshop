<?php
  require_once('../src/klusjes.php');
  $klusjes = new Klusjes();

  if (isset($_POST['toevoegen'])) {
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $klantId = $_GET['id'];
    $aantalUur = $_POST['aantal_uur'];
    $uurKosten = $_POST['uur_kosten'];
    $voorrijKosten = $_POST['voorrij_kosten'];
    $materiaalKosten = $_POST['materiaal_kosten'];

    if ($klusjes->klusToevoegen($naam, $omschrijving, $klantId, $aantalUur, $uurKosten, $voorrijKosten, $materiaalKosten))
      header('location: klant_overzicht.php');
    else
      $errorMessage = "Foutje";
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
    <table>
      <tr>
        <td><label for="naam">Naam klus: </label></td>
        <td><input type="text" name="naam"></td>
      </tr>
      <tr>
        <td><label for="omschrijving">Omschrijving: </label></td>
        <td><textarea name="omschrijving"></textarea></td>
      </tr>
      <tr>
        <td><label for="aantal_uur">Aantal uur: </label></td>
        <td><input type="text" name="aantal_uur" id="aantal_uur"></td>
      </tr>
      <tr>
        <td><label for="uur_kosten">Kosten per uur: </label></td>
        <td><input type="text" name="uur_kosten" id="uur_kosten"></td>
      </tr>
      <tr>
        <td><label for="voorrij_kosten">Voorrij kosten</label></td>
        <td><input type="text" name="voorrij_kosten" id="voorrij_kosten"></td>
      </tr>
      <tr>
        <td><label for="materiaal_kosten">Materiaal kosten</label></td>
        <td><input type="text" name="materiaal_kosten" id="materiaal_kosten"></td>
      </tr>
    </table> 
    <?= $errorMessage ?? null ?>
    <input class="buttonInput" type="submit" name="toevoegen" value="Toevoegen">
  </form>

  <br>
  <a class="button" href="klant_overzicht.php">Terug naar overzicht</a>
</body>
</html>