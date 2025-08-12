<?php
// api/get_messages.php
header('Content-Type: application/json');

// Database connection
require_once 'db_connection.php';

try {
    $conn = getDatabaseConnection();

    $query = "SELECT id, name, feedback, created_at FROM feedback ORDER BY created_at DESC LIMIT 20";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $feedbacks = $stmt->fetchAll();

    echo json_encode([
        'success' => true,
        'feedback' => $feedbacks
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Database error: ' . $e->getMessage()
    ]);
}
?>

