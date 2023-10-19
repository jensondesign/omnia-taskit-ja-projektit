CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    confirmation_token VARCHAR(255),
    confirmed INT DEFAULT 0
);
