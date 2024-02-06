my sqal

-- Create a new database (if it doesn't exist already)
CREATE DATABASE IF NOT EXISTS contact_form_db;

-- Use the newly created database
USE contact_form_db;

-- Create a table to store contact form submissions
CREATE TABLE IF NOT EXISTS contact_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    number VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


