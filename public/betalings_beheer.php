<?php 
  require_once('../src/facturen.php');
  $factuur = new Facturen();

  $alleFacturen = $factuur->getFacturen();
?>

<h1>Betalings Beheer</h1>

<table border=1>
  <thead>
    <th>Id</th>
    <th>Klant Naam</th>
    <th>Totale Kosten</th>
    <th>Betaalt/Niet Betaalt</th>
    <th>Volledige informatie</th>
  </thead>
      <?php foreach ($alleFacturen as $facturen): ?>
        <tr>
          <td><?= $facturen['id'] ?></td>
          <td><?= $facturen['naam'] ?></td>
          <td><?= '€ ', $facturen['totaal_kosten'] ?></td>
          <?= $facturen['betaling_status'] ? "<td>Betaald</td>" : "<td>Niet betaald</td>" ?>
          <td><a href="betaling_detail.php?id=<?= $facturen['id'] ?>">bekijk</a></td>
        </tr>
      <?php endforeach; ?>
</table>