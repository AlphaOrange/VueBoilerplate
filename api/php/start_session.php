<?php

// set session/cookie expiration
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);

// only accept from same site
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_samesite', 'Lax');

// In production, set this to true if using HTTPS
// ini_set('session.cookie_secure', 1);

session_start();
?>