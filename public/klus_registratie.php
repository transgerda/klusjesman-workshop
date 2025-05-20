<?php
  require_once('../src/klusjes.php');
  $klusjes = new Klusjes();

  if (isset($_POST['toevoegen'])) {
    if ($klusjes->klusToevoegen($_POST['naam'], $_POST['omschrijving'], $_GET['id']))
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
    <label for="naam">Naam klus: </label>
    <input type="text" name="naam"><br>

    <label for="omschrijving">omschrijving</label>
    <textarea name="omschrijving"></textarea><br>
    <input type="submit" name="toevoegen" value="Toevoegen">
  </form>
</body>
</html>