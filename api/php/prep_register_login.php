<?php

// get login/registration info
$input = json_decode(file_get_contents('php://input'), true);
$username = $input['username'] ?? '';
$password = $input['password'] ?? '';

// validate input: has username and password
if (!$username || !$password) {
  http_response_code(400);
  echo json_encode(['error' => 'Missing username or password.']);
  exit;
}

// set up connection
$mysqli = new mysqli(
  $config['authDB']['db_host'],
  $config['authDB']['db_user'],
  $config['authDB']['db_pass'],
  $config['authDB']['db_name']
);

// send error if connection fails
if ($mysqli->connect_error) {
  http_response_code(500);
  echo json_encode(['error' => 'Database connection failed']);
  exit;
}

?>