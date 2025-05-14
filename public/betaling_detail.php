<?php 
  require_once('../src/facturen.php');
  $factuur = new Facturen();

  $id = $_GET['id'];
  $facturen = $factuur->getFactuurById($id);

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

<table border=1>
  <tr>
    <td>Id</td>
    <td><?= $facturen['id'] ?></td>
  </tr>
  <tr>
    <td>Naam</td>
    <td><?= $facturen['naam'] ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?= $facturen['email'] ?></td>
  </tr>
  <tr>
    <td>Telefoonnummer</td>
    <td><?= $facturen['telefoon_nummer'] ?></td>
  </tr>
  <tr>
    <td>Adres</td>
    <td><?= $facturen['adres'] ?></td>
  </tr>
  <tr>
    <td>betaling status</td>
    <?= $facturen['betaling_status'] ? "<td>Betaald</td>" : "<td>Niet betaald</td>" ?>
  </tr>
  <tr>
    <td>Uur kosten</td>
    <td><?='€ ',  $facturen['uur_kosten'] ?></td>
  </tr>
  <tr>
    <td>Material Kosten</td>
    <td><?='€ ',  $facturen['materiaal_kosten'] ?></td>
  </tr>
  <tr>
    <td>voorrij kosten</td>
    <td><?='€ ',  $facturen['voorrij_kosten'] ?></td>
  </tr>
  <tr>
    <td>totale kosten</td>
    <td><?='€ ',  $facturen['totaal_kosten'] ?></td>
  </tr>
</table>