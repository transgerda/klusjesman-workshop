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
</head>
<body>
  <h1>Klus registrate</h1>

  <form method="post">
    <table>
      <tr>
        <td><label for="naam">Naam klus: </label></td>
        <td> <input type="text" name="naam"></td>
      </tr>
      <tr>
        <td><label for="omschrijving">omschrijving:</label></td>
        <td><textarea name="omschrijving"></textarea><br></td>
      </tr>
      <tr>
        <td><label for="uurKosten">Uur kosten:</label></td>
        <td><input type="text" name="uurKosten" id="uurKosten"></td>
      </tr>
      <tr>
        <td><label for="aantalUur">Aantal uur:</label></td>
        <td><input type="text" name="aantalUur" id="aantalUur"></td>
      </tr>
      <tr>
        <td><label for="voorrijKosten">Voorrij kosten:</label></td>
        <td><input type="text" name="voorrijKosten" id="voorrijKosten"></td>
      </tr>
    </table>
    <input type="submit" name="toevoegen" value="Toevoegen">
  </form>
</body>
</html>