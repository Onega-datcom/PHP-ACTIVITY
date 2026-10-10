<?php
$message = '';
$messageClass = 'mb-3';
$username = '';
$email = '';

if (isset($_POST['register'])) {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

    $error = '';

    if ($username === '' || $email === '' || trim($password) === '' || trim($confirmPassword) === '') {
        $error = "Please fill in all required fields.";
    } elseif (mb_strlen($username) < 5) {
        $error = "Username must be at least 5 characters long.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long.";
    } elseif ($confirmPassword !== $password) {
        $error = "Passwords do not match.";
    }

    if ($error === '') {
        $message = "Registration successful! You can now log in.";
        $messageClass = 'mb-3 text-success';
        $username = '';
        $email = '';
    } else {
        $message = $error;
        $messageClass = 'mb-3 text-danger';
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis:YEAR@1979&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.22.1/jquery.validate.min.js" integrity="sha512-qu7dMuIm2f0KcKZ3BOoP4c+Hn+r4E8PbD2Ro4rmKsOyheCxcwhzQpf6SojA76dn+owqfANzfTFUTkGA+HpHjOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
  <body class="register-page d-flex align-items-center justify-content-center min-vh-100">

    <div class="container my-auto">
        <div class="row justify-content-center align-items-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 p-4 rounded-4 bg-white bg-opacity-50">
                <h1 class="mb-5 text-center">REGISTER</h1>
                
                <form id="register-form" method="POST" action="./register.php" novalidate>
                    <div class="mb-3">
                        <label class="visually-hidden" for="register-username">Username</label>
                        <input id="register-username" name="username" type="text" class="form-control rounded-pill p-3" placeholder="Username" autocomplete="username" minlength="5" value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="visually-hidden" for="register-email">Email Address</label>
                        <input id="register-email" name="email" type="email" class="form-control rounded-pill p-3" placeholder="Email Address" autocomplete="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="visually-hidden" for="register-password">Password (at least 8 characters)</label>
                        <input id="register-password" name="password" type="password" class="form-control rounded-pill p-3" placeholder="Password" autocomplete="new-password" minlength="8" required>
                    </div>

                    <div class="mb-3">
                        <label class="visually-hidden" for="register-confirm-password">Confirm password</label>
                        <input id="register-confirm-password" name="confirmPassword" type="password" class="form-control rounded-pill p-3" placeholder="Confirm password" autocomplete="new-password" required>
                    </div>

                    <div id="register-message" class="<?= $messageClass ?>" role="status" aria-live="polite"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div>

                    <div class="mb-3">
                        <button type="submit" name="register" class="btn btn-primary text-dark p-3 w-100 rounded-pill">Register</button>
                    </div>
                </form>

                <div class="text-center">
                    <p>Already have an account? <a href="./login.php">Login</a></p>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>