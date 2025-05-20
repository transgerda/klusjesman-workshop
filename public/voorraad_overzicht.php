<?php
  require_once('../src/voorraad.php');
  $voorraad = new Voorraad();

  $huidigeVoorraad = $voorraad->getVoorraad();
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
<table>
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
      <td><a class="buttonSmall" href="voorraad_bewerken.php?id=<?= $item['id'] ?>">Bewerk</a></td>
    </tr>
  <?php endforeach; ?>
</table>

