-- database_setup.sql


-- Create database
CREATE DATABASE IF NOT EXISTS hello_world;
USE hello_world;

-- Create feedback table with Name and Feedback columns
CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    feedback TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert some initial data
INSERT INTO feedback (name, feedback) VALUES
('Ajit', 'Hello from the database!'),
('Admin', 'Welcome to our three-tier architecture demo'),
('User', 'This is a simple example showing frontend, backend, and database');