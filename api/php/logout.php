<?php
require_once __DIR__ . '/cors.php';
require_once __DIR__ . '/start_session.php';

header('Content-Type: application/json');

session_unset();
session_destroy();

echo json_encode(['message' => 'Logged out']);