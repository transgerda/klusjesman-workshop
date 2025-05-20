<?php
  require_once('database.php');

  class Klusjes extends Database {
    public function klusToevoegen($naam, $omschrijving) {
      $query = "INSERT INTO klusjes (naam, omschrijving) VALUES (?, ?);";
      $params = [$naam, $omschrijving];

      return parent::voerQueryUit($query, $params);
    }
  }