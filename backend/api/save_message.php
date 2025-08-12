<?php
// api/save_message.php
header('Content-Type: application/json');

require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'error' => 'Invalid request method'
    ]);
    exit;
}

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$feedback = isset($_POST['feedback']) ? trim($_POST['feedback']) : '';

if (empty($name) || empty($feedback)) {
    echo json_encode([
        'success' => false,
        'error' => 'Name and Feedback cannot be empty'
    ]);
    exit;
}

try {
    $conn = getDatabaseConnection();

    $query = "INSERT INTO feedback (name, feedback) VALUES (:name, :feedback)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':feedback', $feedback);
    $stmt->execute();

    echo json_encode([
        'success' => true,
        'message' => 'Feedback saved successfully'
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Database error: ' . $e->getMessage()
    ]);
}
?>
