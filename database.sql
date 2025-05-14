CREATE DATABASE klusjesman;

CREATE TABLE klanten (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  naam text NOT NULL,
  email text NOT NULL,
  adres text NOT NULL,
  telefoon_nummer text NOT NULL 
);