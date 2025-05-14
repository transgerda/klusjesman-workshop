<?php
  require_once('database.php');

  class Klant extends Database {
    public function insertKlant($naam, $email, $adres, $telefoon_nummer) {
      $query = "INSERT INTO klanten (naam, email, adres, telefoon_nummer) VALUES (?, ?, ?, ?);";
      $params = [$naam, $email, $adres, $telefoon_nummer];

      return parent::voerQueryUit($query, $params);
    }

    public function getAllKlanten() {
      $query = "SELECT * FROM klanten;";

      return parent::voerQueryUit($query);
    }

    public function getKlantById($id) {
      $query = "SELECT * FROM klanten WHERE id = ?;";
      $params = [$id];

      return parent::voerQueryUit($query, $params)[0];
    }
  }