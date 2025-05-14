<?php
  require_once('../src/voorraad.php');
  $voorraad = new Voorraad();

  $huidigeVoorraad = $voorraad->getVoorraad();
?>

<table border=1>
  <tr>
    <th>Naam</th>
    <th>Aantal</th>
    <th>Prijs</th>
    <th>Bewerken</th>
  </tr>

  <?php foreach ($huidigeVoorraad as $item): ?>
    <tr>
      <td><?= $item['naam'] ?></td>
      <td><?= $item['aantal'] ?></td>
      <td><?= $item['prijs'] ?></td>
      <td><a href="voorraad_bewerken.php?id=<?= $item['id'] ?>">Bewerk</a></td>
    </tr>
  <?php endforeach; ?>
</table>

