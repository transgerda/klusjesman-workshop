<?php 
  require_once('../src/klant.php');
  require_once('../src/klusjes.php');
  require_once('../src/adres.php');

  $cKlant = new Klant();
  $klusjes = new Klusjes();
  $adres = new Adres();

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
<table>
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
  <tr>
    <td>Adres</td>
    <td><?= $klant['adres'] ?></td>
  </tr>
  </table>


  <a class="button" href="adres_update.php?klant_id=<?= $klant['id'] ?>">Update adres</a>
</div>

<br><br>

<?php if ($adres->getOudeAdressen($klantId)): ?>
  <h2>Oude adressen</h2>
  <div>
    <table>
      <?php foreach ($adres->getOudeAdressen($klantId) as $oudAdres): ?>
        <tr>
          <td><?= $oudAdres['adres'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
<?php endif; ?>


<a class="button" href="klant_overzicht.php">Terug naar overzicht</a><br><br>
<?php if ($klusjesVanKlant) echo "<h2>Klanten</h2>"; ?>
<div class="klusjes">
  <?php foreach ($klusjesVanKlant as $klusje): ?>
    <br>
    <table>
    <thead>
      <tr>
        <td>Naam</td>
        <td>Omschrijving</td>
        <td>Totaal Uren</td>
        <td>Urenkosten</td>
        <td>Materiaalkosten</td>
        <td>Voorrijkosten</td>
        <td>Totaalkosten</td>
        <td>Factuur</td>
      </tr>
    </thead>
        <tr>
          <td><?= $klusje['naam'] ?></td>
          <td><?= $klusje['omschrijving'] ?></td>
          <td><?= $klusje['aantal_uur'] ?></td>
          <td><?= '€ ' . $klusje['uur_kosten'] ?></td>
          <td><?= '€ ' . $klusje['materiaal_kosten'] ?></td>
          <td><?= '€ ' . $klusje['voorrij_kosten'] ?></td>
          <td><?= '€ ' . $klusje['aantal_uur'] * $klusje['uur_kosten'] + $klusje['voorrij_kosten'] ?></td>
          <td><a class="buttonSmall" href="factuur_registratie.php?klantId=<?= $klant['id'] ?>&klusId=<?= $klusje['id'] ?>">Factuur maken</a></td>
        </tr>
      </table>
      <?php endforeach; ?>
</table>

</div>  
