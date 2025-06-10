<?php 
  require_once('../src/adres.php');

  $adres = new Adres();

  if (isset($_POST['update_adres'])) {
    if ($adres->updateAdres($_GET['klant_id'], $_POST['adres']))  {
      header('location: klant_detail.php?id=' . $_GET['klant_id']);
    }
  }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.sidebar').load('sidebar.php');
    })
  </script>

<div class="sidebar"></div>

<form method="post">
  <label class="textAdres" for="adres">Nieuw adres:</label><br>
  <input class="inputStyling" type="text" name="adres" id="adres"><br><br>
  <input class="buttonInput" type="submit" name="update_adres" value="Update">
</form>