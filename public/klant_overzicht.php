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
  <?php
    require_once('../src/klant.php');

    $cKlant = new Klant();
    $klanten = $cKlant->getAllKlanten();
  ?>

  <table border=1>
    <thead>
      <tr>
        <td>Naam</td>
        <td>Email</td>
        <td>Adres</td>
        <td>Telefoonnummer</td>
        <td>Meer details</td>
      </tr>
    </thead>
      <?php foreach ($klanten as $klant): ?>
        <tr>
        <td><?= $klant['naam'] ?></td>
        <td><?= $klant['email'] ?></td>
        <td><?= $klant['adres'] ?></td>
        <td><?= $klant['telefoon_nummer'] ?></td>
        <td><a href="klant_detail.php?id=<?= $klant['id'] ?>">bekijk</a></td>
        </tr>
      <?php endforeach; ?>
    </table>

    <a href="klant_registratie.php">Klant registreren</a>
</body>
</html>