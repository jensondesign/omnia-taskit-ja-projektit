CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    address VARCHAR(100) NOT NULL,
    address2 VARCHAR(10) NOT NULL,
    country VARCHAR(50) NOT NULL,
    state VARCHAR(50) NOT NULL,
    zip VARCHAR(10) NOT NULL,
    maksutapa VARCHAR(50) NOT NULL,
    palaute TEXT,
    rekisteroitymispvm TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);