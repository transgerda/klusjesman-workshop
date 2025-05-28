<?php
  require_once('database.php');

  class Adres extends Database {
    public function updateAdres($klant_id, $adres) {
      $this->zetAdressenOpOud($klant_id);
      $query = "INSERT INTO adressen (adres, klant_id) VALUES (?, ?);";
      $params = [$adres, $klant_id];
  
      return parent::voerQueryUit($query, $params);
    }
    
    public function zetAdressenOpOud($klant_id) {
      $query = "UPDATE adressen SET huidig_adres = 0 WHERE klant_id = ? AND huidig_adres = 1;";
      $params = [$klant_id];
  
      parent::voerQueryUit($query, $params);
    }


    public function getOudeAdressen($klant_id) {
      $query = "SELECT * FROM adressen WHERE klant_id = ? AND huidig_adres = 0;";
      $params = [$klant_id];

      return parent::voerQueryUit($query, $params);
    }
  }