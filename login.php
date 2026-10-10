<?php
session_start();

if (isset($_POST['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: ./login.php');
    exit;
}

$message = '';
$messageClass = 'mb-3';
$username = '';

if (isset($_POST['login'])) {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $error =
        $username === '' || trim($password) === '' ? "Please input username and password." :
        (mb_strlen($username) < 5 ? "Username must be at least 5 characters long." :
        (strlen($password) < 8 ? "Password must be at least 8 characters long." :
        ""));

    if ($error === '') {
        $_SESSION['username'] = $username;
        header('Location: ./index.php');
        exit;
    }

    $message = $error;
    $messageClass = 'mb-3 text-danger';
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis:YEAR@1979&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.22.1/jquery.validate.min.js" integrity="sha512-qu7dMuIm2f0KcKZ3BOoP4c+Hn+r4E8PbD2Ro4rmKsOyheCxcwhzQpf6SojA76dn+owqfANzfTFUTkGA+HpHjOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
  <body class="login-page d-flex align-items-center justify-content-center min-vh-100">

    <div class="container my-auto">
        <div class="row justify-content-center align-items-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 p-4 rounded-4 bg-white bg-opacity-50">
                <h1 class="mb-5 text-center">LOGIN</h1>

                <form id="login-form" method="POST" action="./login.php" novalidate>
                    <div class="mb-3">
                        <label class="visually-hidden" for="login-username">Username</label>
                        <input id="login-username" name="username" type="text" class="form-control rounded-pill p-3" placeholder="Username or email" autocomplete="username" minlength="5" value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>" required>
                    </div>

                    <div class="mb-0">
                        <label class="visually-hidden" for="login-password">Password</label>
                        <input id="login-password" name="password" type="password" class="form-control rounded-pill p-3" placeholder="Password" autocomplete="current-password" minlength="8" required>
                    </div>

                    <div id="login-message" class="<?= $messageClass ?>" role="alert" aria-live="polite"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div>

                    <div class="mb-3">
                        <button type="submit" name="login" class="btn btn-warning p-3 w-100 rounded-pill">Login</button>
                    </div>
                </form>

                <div class="text-center">
                    <p>Don't have an account? <a href="./register.php">Register</a></p>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>