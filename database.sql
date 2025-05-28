CREATE DATABASE klusjesman;
use klusjesman;

CREATE TABLE klanten (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  naam text NOT NULL,
  email text NOT NULL,
  telefoon_nummer text NOT NULL
);

CREATE TABLE klusjes (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  klant_id int NOT NULL,
  naam text NOT NULL,
  omschrijving text NOT NULL,
  aantal_uur float NOT NULL,
  uur_kosten float NOT NULL,
  voorrij_kosten float NOT NULL,
  materiaal_kosten float NOT NULL,
  totaal_kosten FLOAT GENERATED ALWAYS AS ((aantal_uur * uur_kosten) + voorrij_kosten + materiaal_kosten) STORED
);

CREATE TABLE adressen (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  adres text NOT NULL,
  huidig_adres INT NOT NULL DEFAULT 1,
  klant_id INT NOT NULL
);

CREATE TABLE facturen (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  klant_id int NOT NULL,
  klus_id int NOT NULL,
  betaling_status tinyint DEFAULT 0,
  datum_gemaakt DATETIME DEFAULT CURRENT_TIMESTAMP,

  CONSTRAINT factuur_klusje FOREIGN KEY (klus_id) REFERENCES klusjes(id),
  CONSTRAINT factuur_klant FOREIGN KEY (klant_id) REFERENCES klanten(id)
);

CREATE TABLE voorraad (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  naam text NOT NULL,
  aantal int NOT NULL,
  prijs float NOT NULL
);


INSERT INTO 
  klanten (naam, email, telefoon_nummer)
VALUES
  ('Martijn', 'martijn@email.com', '0612345678'),
  ('Babs', 'babs@email.com', '0687654321'),
  ('Gianluca', 'gianluca@email.com', '0669696969');

INSERT INTO 
  adressen (adres, klant_id)
VALUES
  ('Yusustraat 22', 1),
  ('Didam', 2),
  ('Afrika', 3);

INSERT INTO voorraad 
  (naam, aantal, prijs)
VALUES 
  ('houten balken', 3, 11.95),
  ('Schroeven', 100, 0.25),
  ('Houten platen', 2, 22);