<?php
if (session_status() === PHP_SESSION_NONE) {
    if (headers_sent()) {
        $sid = isset($_COOKIE[session_name()]) ? $_COOKIE[session_name()] : '';
        if (is_string($sid) && preg_match('/^[A-Za-z0-9,-]{22,256}$/', $sid)) {
            session_id($sid);
        }
        session_start(['use_cookies' => 0, 'cache_limiter' => '']);
    } else {
        session_start();
    }
}

if (empty($_SESSION['username'])) {
    if (!headers_sent()) {
        header('Location: ./login.php');
    } else {
        echo '<script>window.location.replace("./login.php");</script>';
    }
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="landing-page d-flex flex-column align-items-center justify-content-center min-vh-100">