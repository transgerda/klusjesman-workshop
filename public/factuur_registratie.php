<?php
  require_once('../src/factuur.php');
  $factuur = new Factuur();

  if ($factuur->maakFactuur($_GET['klantId'], $_GET['klusId']))
    header('location: factuur_overzicht.php');
  else 
    echo "Fout opgetreden. Ga hier <a href='klant_detail.php?{$_GET['klantId']}>terug</a>.";
    
