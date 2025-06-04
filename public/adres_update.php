<?php 
  require_once('../src/adres.php');

  $adres = new Adres();

  if (isset($_POST['update_adres'])) {
    if ($adres->updateAdres($_GET['klant_id'], $_POST['adres']))  {
      header('location: klant_detail.php?id=' . $_GET['klant_id']);
    }
  }
?>

<form method="post">
  <label for="adres">Nieuw adres:</label>
  <input type="text" name="adres" id="adres"><br><br>
  <input type="submit" name="update_adres" value="Update">
</form>