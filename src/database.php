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

    if (str_contains($query, 'SELECT')) {
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return $statement->rowCount();
    }
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