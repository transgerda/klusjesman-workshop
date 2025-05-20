<?php 
  require_once('../src/klant.php');
  $cKlant = new Klant();

  $klantId = $_GET['id'];
  $klant = $cKlant->getKlantById($klantId);
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