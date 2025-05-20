<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Klus registrate</h1>

  <form action="post">
    <label for="naam">Naam klus: </label>
    <input type="text" name="naam">

    <label for="omschrijving">omschrijving</label>
    <input type="textarea">
  </form>

    <table border=1>
    <thead>
      <tr>
        <td>ID</td>
        <td>Naam</td>
        <td>Klusjes</td>
      </tr>
    </thead>
      <?php foreach ($klusjes as $klusje): ?>
        <tr>
        <td><?= $klusje['id'] ?></td>
        <td><?= $klusje['naam'] ?></td>
        <td><?= $klusje['omschrijving']?></td>
      <?php endforeach; ?>
    </table>
</body>
</html>