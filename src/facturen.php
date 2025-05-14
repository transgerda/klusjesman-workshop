<?php
require_once('database.php');

class Facturen extends Database
{

  public function getFacturen() {
    $query = "SELECT f.id, k.naam, f.totaal_kosten, f.betaling_status 
      FROM facturen AS f
      INNER JOIN klanten AS k 
      ON k.id = f.klantId;";

    return parent::voerQueryUit($query);
  }

  public function getFactuurById($id) {
    $query = "SELECT *
      FROM facturen AS f
      INNER JOIN klanten AS k 
      ON k.id = f.klantId
      WHERE f.id = ?;";

      $params = [$id];

    return parent::voerQueryUit($query, $params)[0];
  }
}