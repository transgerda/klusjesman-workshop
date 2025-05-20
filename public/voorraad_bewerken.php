<?php 
  require_once('../src/voorraad.php');
  $voorraad = new Voorraad();

  $id = $_GET['id'];
  $voorraadDetails = $voorraad->getVoorraadById($id);

  if (!isset($naam, $aantal, $prijs)) {
    $naam = $voorraadDetails['naam'];
    $aantal = $voorraadDetails['aantal'];
    $prijs = $voorraadDetails['prijs'];
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
<table border=1>
  <tr>
    <td>Id</td>
    <td><?= $voorraadDetails['id'] ?></td>
  </tr>
    <form method="post">
    <tr>
      <td>Naam</td>
      <td><input type="text" name="naam" value="<?= $naam ?>"></td>
    </tr>
    <tr>
      <td>Aantal</td>
      <td><input type="text" name="aantal" value="<?= $aantal ?>"></td>
    </tr>
    <tr>
      <td>Prijs</td>
      <td><input type="text" name="prijs" value="<?= $prijs ?>"></td>
    </tr>
  </table>
  <input type="submit" name="opslaan" value="Opslaan">

</form>
<a href="voorraad_overzicht.php">Terug</a>

<?php
  if (isset($_POST['opslaan'])) {
    $naam = $_POST['naam'];
    $aantal = floatval($_POST['aantal']);
    $prijs = floatval($_POST['prijs']);

    $voorraad->updateVoorraad($id, $naam, $aantal, $prijs);
  }
?>