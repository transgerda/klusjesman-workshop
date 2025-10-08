<?php
  session_start();
  require_once('../src/klusjes.php');
  require_once('../src/voorraad.php');
  $klusjes = new Klusjes();
  $voorraad = new Voorraad();


  if (isset($_POST['toevoegen'])) {
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $klantId = $_GET['id'];
    $aantalUur = $_POST['aantal_uur'];
    $uurKosten = $_POST['uur_kosten'];
    $voorrijKosten = $_POST['voorrij_kosten'];
    $materiaalKosten = $_POST['materiaal_kosten'];

    if ($klusjes->klusToevoegen($naam, $omschrijving, $klantId, $aantalUur, $uurKosten, $voorrijKosten, $materiaalKosten)) {
      unset($_SESSION['materialen_voor_klusje']);
      header('location: klant_overzicht.php');
    }
    else
      $errorMessage = "Foutje";
  }

  $materialenUitVorraad = $voorraad->getVoorraad();

  if (!isset($_SESSION['materialen_voor_klusje']))
    $_SESSION['materialen_voor_klusje'] = [];

  if (isset($_POST['materiaal_toevoegen'])) {      
    $_SESSION['naam'] = $_POST['naam'];
    $_SESSION['omschrijving'] = $_POST['omschrijving'];
    $_SESSION['klantId'] = $_GET['id'];
    $_SESSION['aantalUur'] = $_POST['aantal_uur'];
    $_SESSION['uurKosten'] = $_POST['uur_kosten'];
    $_SESSION['voorrijKosten'] = $_POST['voorrij_kosten'];
    $_SESSION['materiaalKosten'] = $_POST['materiaal_kosten'];

    $al_toegevoegd = false;
    foreach ($_SESSION['materialen_voor_klusje'] as &$item) {
      echo $item['id'] . $_POST['materiaal_id'];
      if ($item['id'] == $_POST['materiaal_id']) {
        $item['aantal'] += $_POST['aantal']; 
        $al_toegevoegd = true;
      }
    }
    unset($item);

    if (!$al_toegevoegd)
      $_SESSION['materialen_voor_klusje'][] = [ 'id' => $_POST['materiaal_id'], 'aantal' => $_POST['aantal'] ];
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
        <td><input type="text" name="naam" value="<?= $_SESSION['naam'] ?? null ?>"></td>
      </tr>
      <tr>
        <td><label for="omschrijving">Omschrijving: </label></td>
        <td><textarea name="omschrijving" value="<?= $_SESSION['omschrijving'] ?? null ?>"></textarea></td>
      </tr>
      <tr>
        <td><label for="aantal_uur">Aantal uur: </label></td>
        <td><input type="text" name="aantal_uur" id="aantal_uur" value="<?= $_SESSION['aantalUur'] ?? null ?>"></td>
      </tr>
      <tr>
        <td><label for="uur_kosten">Kosten per uur: </label></td>
        <td><input type="text" name="uur_kosten" id="uur_kosten" value="<?= $_SESSION['uurKosten'] ?? null ?>"></td>
      </tr>
      <tr>
        <td><label for="voorrij_kosten">Voorrij kosten</label></td>
        <td><input type="text" name="voorrij_kosten" id="voorrij_kosten" value="<?= $_SESSION['voorrijKosten'] ?? null ?>"></td>
      </tr>
      <tr>
        <td><label for="materiaal_kosten">Materiaal kosten</label></td>
        <td><input type="text" name="materiaal_kosten" id="materiaal_kosten" value="<?= $_SESSION['materiaalKosten'] ?? null ?>"></td>
      </tr>
      <?php foreach ($_SESSION['materialen_voor_klusje'] as $item): ?>
        <tr>
          <td><?= $voorraad->getVoorraadById($item['id'])['naam'] ?></td>
          <td><?= $item['aantal'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
     
    <?= $errorMessage ?? null ?>
    <input class="buttonInput" type="submit" name="toevoegen" value="Toevoegen">
    <form method="post">
      <select name="materiaal_id">
        <?php foreach ($materialenUitVorraad as $item): ?>
          <option value="<?= $item['id'] ?>"><?= $item['naam'] ?></option>
        <?php endforeach; ?>
      </select>

      <input type="number" name="aantal" value="1">

      <input type="submit" name="materiaal_toevoegen" value="Materiaal toevoegen">
    </form>

  </form>

  <br>
  <a class="button" href="klant_overzicht.php">Terug naar overzicht</a>
</body>
</html>