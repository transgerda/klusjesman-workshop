<?php
  require_once('../src/klant.php');

  $cKlant = new Klant();
  $klanten = $cKlant->getAllKlanten();

  if (isset($_POST['zoeken'])) {
    if ($_POST['query'] == "")
      $klanten = $cKlant->getALlKlanten();
    else
      $klanten = $cKlant->zoekKlantenBijAdresOfNaam($_POST['query']);
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
  
  <form method="post">
    <input type="text" name="query">
    <input class="buttonSmall" type="submit" name="zoeken" value="Zoeken">
  </form>
  <br>
  
  <table>
    <thead>
      <tr>
        <th>Naam</th>
        <th>Email</th>
        <th>Adres</th>
        <th>Telefoonnummer</th>
        <th>Meer details</th>
        <th>Klusjes</th>
      </tr>
    </thead>
      <?php foreach ($klanten as $klant): ?>
        <tr>
        <td><?= $klant['naam'] ?></td>
        <td><?= $klant['email'] ?></td>
        <?php if ($klant['huidig_adres']): ?>
          <td><?= $klant['adres'] ?></td>
        <?php else: ?>
          <td><p style="color: red;">Oud adres</p><?= $klant['adres'] ?></td>  
        <?php endif; ?>
          <td><?= $klant['telefoon_nummer'] ?></td>
        <td><a class="buttonSmall" href="klant_detail.php?id=<?= $klant['id'] ?>">bekijk</a></td>
        <td><a class="buttonSmall" href="klus_registratie.php?id=<?= $klant['id'] ?>">klusje toevoegen</a></td>
      <?php endforeach; ?>
    </table>

  <a class="button" href="klant_registratie.php">Klant registreren</a>
</body>
</html>