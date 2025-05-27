<?php
require_once('database.php');

class Factuur extends Database
{
  public function getFacturen() {
    $query = "SELECT f.betaling_status, klus.totaal_kosten, klant.naam, f.id
      FROM facturen f
      INNER JOIN klanten klant ON klant.id = f.klant_id
      INNER JOIN klusjes klus ON f.klus_id = klus.id
      ORDER BY f.datum_gemaakt DESC;";

    return parent::voerQueryUit($query);
  }

  public function getFactuurById($id) {
    $query = "SELECT * FROM facturen f 
    INNER JOIN klanten klant ON f.klant_id = klant.id
    INNER JOIN klusjes klus ON f.klus_id = klus.id
    WHERE f .id = ?;";

    $params = [$id];

    return parent::voerQueryUit($query, $params)[0];
  }

  public function maakFactuur($klant_id, $klus_id) {
    $query = "INSERT INTO facturen (klant_id, klus_id) VALUES (?, ?);";
    $params = [$klant_id, $klus_id];

    
    return parent::voerQueryUit($query, $params);
  }

  public function zetStatusOpBetaald($factuur_id) {
    $query = "UPDATE facturen SET betaling_status = 1 WHERE id = ?;";
    $params = [$factuur_id];

    return parent::voerQueryUit($query, $params);
  }
}