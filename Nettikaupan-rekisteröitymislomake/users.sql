CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    etunimi VARCHAR(50) NOT NULL,
    sukunimi VARCHAR(50) NOT NULL,
    kayttajanimi VARCHAR(50) NOT NULL UNIQUE,
    salasana VARCHAR(255) NOT NULL,
    sahkoposti VARCHAR(100),
    osoite VARCHAR(100) NOT NULL,
    asunnonnro VARCHAR(10) NOT NULL,
    maa VARCHAR(50) NOT NULL,
    maakunta VARCHAR(50) NOT NULL,
    postinumero VARCHAR(10) NOT NULL,
    maksutapa VARCHAR(50) NOT NULL,
    palaute TEXT,
    rekisteroitymispvm TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);