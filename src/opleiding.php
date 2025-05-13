<?php
require_once('database.php');

class Opleiding extends Database {
  public function getAllOpleidingen() {
    $query = "SELECT * FROM opleidingen";
    return $this->voerQueryUit($query);
  }
}