<?php
require_once __DIR__ . '/cors.php';
require_once __DIR__ . '/start_session.php';
require_once __DIR__ . '/config.php';

header('Content-Type: application/json');

require_once __DIR__ . '/prep_register_login.php';

// check if username already exists
$checkStmt = $mysqli->prepare("SELECT id FROM users WHERE username = ?");
$checkStmt->bind_param("s", $username);
$checkStmt->execute();
$checkStmt->store_result();

// Check if username already exists
if ($checkStmt->num_rows > 0) {
  http_response_code(409);
  echo json_encode(['error' => 'Username already exists']);
  exit;
}

// Basic input validation
if (strlen($username) < 3 || strlen($username) > 20) {
  http_response_code(400);
  echo json_encode(['error' => 'Username must be between 3 and 20 characters']);
  exit;
}
if (strlen($password) < 8) {
  http_response_code(400);
  echo json_encode(['error' => 'Password must be at least 8 characters']);
  exit;
}

// Insert new user
$hash = password_hash($password, PASSWORD_DEFAULT);
$insertStmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$insertStmt->bind_param("ss", $username, $hash);

if ($insertStmt->execute()) {
  echo json_encode(['message' => 'User registered successfully']);
} else {
  http_response_code(500);
  echo json_encode(['error' => 'Registration failed']);
}
?>
