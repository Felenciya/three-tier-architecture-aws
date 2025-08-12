<?php
// api/db_connection.php

/**
 * Get database connection
 * 
 * @return PDO
 */
function getDatabaseConnection() {
    $host = 'update-me-host';         // Change to your DB host (e.g., localhost or RDS endpoint)
    $db_name = 'hello_world';         // Database name
    $username = 'update-me-username'; // DB username
    $password = 'update-me-password'; // DB password

    $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    return new PDO($dsn, $username, $password, $options);
}
?>

