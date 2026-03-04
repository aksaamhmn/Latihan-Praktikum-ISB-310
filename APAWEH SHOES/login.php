<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'apaweh' && $password === '111') {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        if (isset($_POST['remember'])) {
            setcookie('user_login', $username, time() + 3600, "/");
        }

        header("Location: index.php");
        exit;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login - Apaweh Shoes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center vh-100">
    <div class="container card shadow-sm p-4" style="max-width: 400px;">
        <h3 class="text-center">Login</h3>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger">Username / Password Salah!</div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="rem">
                <label class="form-check-label" for="rem">Remember Me</label>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Masuk</button>
        </form>
    </div>
</body>

</html>