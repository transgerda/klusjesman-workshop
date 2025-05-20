<?php 
  require_once('../src/klant.php');
  require_once('../src/klusjes.php');

  $cKlant = new Klant();
  $klusjes = new Klusjes();

  $klantId = $_GET['id'];
  $klant = $cKlant->getKlantById($klantId);

  $klusjesVanKlant = $klusjes->getAllKlusjesVanKlant($klantId);
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

<div class="klant_detail">
<h1>Klant Detail</h1>
<table border=1>
  <tr>
    <td>Id</td>
    <td><?= $klant['id'] ?></td>
  </tr>
  <tr>
    <td>Naam</td>
    <td><?= $klant['naam'] ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?= $klant['email'] ?></td>
  </tr>
  <tr>
    <td>Telefoonnummer</td>
    <td><?= $klant['telefoon_nummer'] ?></td>
  </tr>
  </table>
</div>

<br><br>
<h1>Klusjes</h1>
<div class="klusjes">
  <?php foreach ($klusjesVanKlant as $klusje): ?>
    <br>
    <table border=1>
    <thead>
      <tr>
        <td>Naam</td>
        <td>Omschrijving</td>
        <td>Totaalkosten</td>
      </tr>
    </thead>
        <tr>
          <td><?= $klusje['naam'] ?></td>
          <td><?= $klusje['omschrijving'] ?></td>
          <td><?= '€ ' . $klusje['aantal_uur'] * $klusje['uur_kosten'] + $klusje['voorrij_kosten'] ?></td>
        </tr>
      </table>
      <?php endforeach; ?>
</table>
</div>  
