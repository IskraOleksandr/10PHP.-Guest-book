CREATE DATABASE guestbook_db;

USE guestbook_db;

CREATE TABLE guest (
                       id_msg INT AUTO_INCREMENT PRIMARY KEY,
                       name VARCHAR(100) NOT NULL,
                       city VARCHAR(100),
                       email VARCHAR(100),
                       url VARCHAR(255),
                       msg TEXT NOT NULL,
                       answer TEXT,
                       puttime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       hide ENUM('show', 'hide') DEFAULT 'show'
);
