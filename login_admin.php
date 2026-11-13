
<?php
session_start();

if (isset($_SESSION['admin'])) {
    header("Location: dashboard_admin.php");
    exit;
}

$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "adminjobboard" && $password === "kelompok3") {
        $_SESSION['admin'] = $username;

        header("Location: dashboard_admin.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin JobBoard</title>
</head>
<body>

<h2>Login Admin JobBoard</h2>

<?php if ($error != ""): ?>
    <p style="color:red;">
        <?= $error ?>
    </p>
<?php endif; ?>

<form method="POST">
    <label>Username</label><br>
    <input type="text" name="username" required>
    <br><br>

    <label>Password</label><br>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit" name="login">
        Login
    </button>
</form>

</body>
</html>
