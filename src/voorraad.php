<?php
require_once('database.php');

class Voorraad extends Database {
  public function getVoorraad() {
    $query = "SELECT * FROM voorraad;";

    return parent::voerQueryUit($query);
  }
  
  public function getVoorraadById($id) {
    $query = "SELECT * FROM voorraad WHERE id = ?;";
    $params = [$id];

    return parent::voerQueryUit($query, $params)[0];
  }

  public function updateVoorraad($id, $naam, $aantal, $prijs) {
    $query = "UPDATE voorraad SET naam = ?, aantal = ?, prijs = ? WHERE id = ?;";
    $params = [$naam, $aantal, $prijs, $id];

    return parent::voerQueryUit($query, $params);
  }
}