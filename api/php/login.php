<?php
require_once __DIR__ . '/cors.php';
require_once __DIR__ . '/start_session.php';
require_once __DIR__ . '/config.php';

header('Content-Type: application/json');

require_once __DIR__ . '/prep_register_login.php';

// request user data from db
$statement = $mysqli->prepare("SELECT id, username, password FROM users WHERE username = ?");
$statement->bind_param("s", $username);
$statement->execute();
$result = $statement->get_result();

// verify login data
if ($user = $result->fetch_assoc()) {
  if (password_verify($password, $user['password'])) {
    // Store user info in session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    echo json_encode([
      'user' => [
        'id' => $user['id'],
        'username' => $user['username']
      ]
    ]);
  } else {
    http_response_code(401);
    echo json_encode(['error' => 'Invalid credentials']);
  }
} else {
  http_response_code(401);
  echo json_encode(['error' => 'User not found']);
}
?>