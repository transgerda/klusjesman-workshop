CREATE DATABASE klusjesman;

CREATE TABLE klanten (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  naam text NOT NULL,
  email text NOT NULL,
  adres text NOT NULL,
  telefoon_nummer text NOT NULL 
);

INSERT INTO 
  klanten (naam, email, adres, telefoon_nummer)
VALUES
  ('Martijn', 'martijn@email.com', 'Kalverstraat 22', '0612345678'),
  ('Babs', 'babs@email.com', 'Keverstraat 32', '0687654321'),
  ('Gianluca', 'gianluca@email.com', 'Yusustraat 69', '0669696969');

CREATE TABLE facturen (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  klantId int NOT NULL,
  betaling_status tinyint DEFAULT 0,
  uur_kosten float,
  materiaal_kosten float,
  voorrij_kosten float,
  totaal_kosten float,
  datum_gemaakt DATETIME DEFAULT CURRENT_TIMESTAMP,

  CONSTRAINT factuur_klant FOREIGN KEY (klantId) REFERENCES klanten(id)
);

CREATE TABLE voorraad (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  naam text NOT NULL,
  aantal int NOT NULL,
  prijs float NOT NULL
);

INSERT INTO voorraad 
  (naam, aantal, prijs)
VALUES 
  ('houten balken', 3, 11.95),
  ('Schroeven', 100, 0.25),
  ('Houten platen', 2, 22);