<?php
require_once('../config/db_config.php');

class Database {
  private $connectie;

  public function __construct() {
    $this->connectie = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
  }

  public function voerQueryUit($query, $params = []) {
    $statement = $this->connectie->prepare($query);
    $statement->execute($params);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  } 

  public function SluitVerbinding() {
    $this->connectie = null;
  }

  public function TestVerbinding() {
    return (bool) $this->connectie;
  }

  public function __destruct() {
    $this->SluitVerbinding();
  }
}