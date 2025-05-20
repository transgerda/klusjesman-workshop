<?php
  require_once('database.php');

  class Klusjes extends Database {
    public function klusToevoegen($naam, $omschrijving, $klant_id) {
      $query = "INSERT INTO klusjes (naam, omschrijving, klant_id) VALUES (?, ?, ?);";
      $params = [$naam, $omschrijving, $klant_id];

      return parent::voerQueryUit($query, $params);
    }

    public function getAllKlusjesVanKlant($klant_id) {
      $query = "SELECT * FROM klusjes WHERE klant_id = ?;";
      $params = [$klant_id];

      return parent::voerQueryUit($query, $params);
    }
  }