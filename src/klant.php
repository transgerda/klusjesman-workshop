<?php
  require_once('database.php');

  class Klant extends Database {
    public function insertKlant($naam, $email, $adres, $telefoon_nummer) {
      $query = "INSERT INTO klanten (naam, email, telefoon_nummer) VALUES (?, ?, ?);";
      $params = [$naam, $email, $telefoon_nummer];

      parent::voerQueryUit($query, $params);
      
      $klant_id = parent::voerQueryUit('SELECT id FROM klanten WHERE naam = ? AND email = ?', [$naam, $email])[0]['id'];

      $query = "INSERT INTO adressen (adres, klant_id) VALUES (?, ?);";
      $params = [$adres, $klant_id];

      return parent::voerQueryUit($query, $params);
    }

    public function getAllKlanten() {
      $query = "SELECT  k.id, k.naam, k.naam, k.email, k.telefoon_nummer, a.adres, a.huidig_adres FROM klanten k INNER JOIN adressen a ON a.klant_id = k.id WHERE a.huidig_adres = 1;";

      return parent::voerQueryUit($query);
    }

    public function getKlantById($id) {
      $query = "SELECT k.id, k.naam, k.naam, k.email, k.telefoon_nummer, a.adres FROM klanten k INNER JOIN adressen a ON k.id = a.klant_id WHERE k.id = ? AND a.huidig_adres = 1;";
      $params = [$id];

      return parent::voerQueryUit($query, $params)[0];
    }

    public function zoekKlantenBijAdresOfNaam($zoek_opdracht) {
      $query = "SELECT k.id, k.naam, k.naam, k.email, k.telefoon_nummer, a.adres, a.huidig_adres FROM klanten k INNER JOIN adressen a ON a.klant_id = k.id WHERE a.adres LIKE :zoek_opdracht OR naam LIKE :zoek_opdracht;";
      $params = [":zoek_opdracht" => "%$zoek_opdracht%"];

      return parent::voerQueryUit($query, $params);
    }
  }