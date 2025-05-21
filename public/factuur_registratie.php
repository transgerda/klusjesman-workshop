<?php
  require_once('../src/factuur.php');
  $factuur = new Factuur();

  $klusId = $_GET['klusId'];
  if ($factuur->maakFactuur($_GET['klantId'], $_GET['klusId']))
    header('location: factuur_detail.php?id=' . $klusId);
  else 
    echo "Fout opgetreden. Ga hier <a href='klant_detail.php?{$_GET['klantId']}>terug</a>.";
    
