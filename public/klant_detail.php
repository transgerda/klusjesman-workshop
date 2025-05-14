<?php 
  require_once('../src/klant.php');
  $cKlant = new Klant();

  $klantId = $_GET['id'];
  $klant = $cKlant->getKlantById($klantId);
?>


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
</table>