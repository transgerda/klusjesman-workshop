<?php
  require_once('database.php');

  class Klusjes extends Database {
    public function klusToevoegen($naam, $omschrijving, $klant_id, $aantalUur, $uurKosten, $voorrijKosten, $materiaalKosten) {
      $query = "INSERT INTO klusjes (naam, omschrijving, klant_id, aantal_uur, uur_kosten, voorrij_kosten, materiaal_kosten) VALUES (?, ?, ?, ?, ?, ?, ?);";
      $params = [$naam, $omschrijving, $klant_id, $aantalUur, $uurKosten, $voorrijKosten, $materiaalKosten];

      parent::voerQueryUit($query, $params);
      
      $klusje_id = parent::voerQueryUit("SELECT id FROM klusjes WHERE naam = ? AND omschrijving = ? ORDER BY id DESC;", [ $naam, $omschrijving ])[0]['id'];

      if (isset($_SESSION['materialen_voor_klusje'])) {
        foreach ($_SESSION['materialen_voor_klusje'] as $item) {
          parent::voerQueryUit("INSERT INTO klusje_materialen (klusje_id, materiaal_id, aantal) VALUES (?, ?, ?)", [ $klusje_id, $item['id'], $item['aantal'] ]);
        }
      }

      return 1;
    }

    public function getAllKlusjesVanKlant($klant_id) {
      $query = "SELECT * FROM klusjes WHERE klant_id = ?;";
      $params = [$klant_id];

      return parent::voerQueryUit($query, $params);
    }
  }