<?php 
  require_once('../src/factuur.php');
  $factuur = new Factuur();

  $alleFacturen = $factuur->getFacturen();
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

<h1>Betalings Beheer</h1><br>

<br>

<table>
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
          <td><a class="ButtonSmall" href="factuur_detail.php?id=<?= $facturen['id'] ?>">bekijk</a></td>
        </tr>
      <?php endforeach; ?>
</table>