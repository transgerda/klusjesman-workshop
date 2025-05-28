<?php 
  require_once('../src/factuur.php');
  $factuur = new Factuur();

  $id = $_GET['id'];
  $huidigFactuur = $factuur->getFactuurById($id);

  if (isset($_POST['status_betaald'])) {
    if ($factuur->zetStatusOpBetaald($_GET['id']))
      header('location: factuur_overzicht.php');
  }
?>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.sidebar').load('sidebar.php');
    })
  </script>
</head>

<div class="sidebar"></div>

<h1>Factuur detail</h1>
<table>
  <tr>
    <td>Naam klant</td>
    <td><?= $huidigFactuur['klant_naam'] ?></td>
  </tr>
  <tr>
    <td>Naam</td>
    <td><?= $huidigFactuur['naam'] ?></td>
  </tr>
  <tr>
    <td>Uur kosten</td>
    <td><?='€ ',  $huidigFactuur['uur_kosten'] ?></td>
  </tr>
  <tr>
    <td>Aantal uur</td>
    <td><?='€ ',  $huidigFactuur['aantal_uur'] ?></td>
  </tr>
  <tr>
    <td>Material Kosten</td>
    <td><?='€ ',  $huidigFactuur['materiaal_kosten'] ?></td>
  </tr>
  <tr>
    <td>voorrij kosten</td>
    <td><?='€ ',  $huidigFactuur['voorrij_kosten'] ?></td>
  </tr>
  <tr>
    <td>totale kosten</td>
    <td><?='€ ',  $huidigFactuur['totaal_kosten'] ?></td>
  </tr>
  <tr>
    <td>betaling status</td>
    <?= $huidigFactuur['betaling_status'] ? "<td>Betaald</td>" : "<td>Niet betaald</td>" ?>
  </tr>
</table>
<form method="post">
  <input class="buttonInput" type="submit" name="status_betaald" value="Factuur betaald!"><br><br>
</form>
Terug naar <a class="buttonSmall" href="factuur_overzicht.php">overzicht</a>.