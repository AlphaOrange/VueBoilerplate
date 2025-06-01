<?php
require_once __DIR__ . '/cors.php';
require_once __DIR__ . '/start_session.php';

header('Content-Type: application/json');

if (isset($_SESSION['user_id'])) {
  echo json_encode([
    'user' => [
      'id' => $_SESSION['user_id'],
      'username' => $_SESSION['username']
    ]
  ]);
} else {
  http_response_code(401);
  echo json_encode(['error' => 'Not logged in']);
}

?>