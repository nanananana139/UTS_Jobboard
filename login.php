
<?php
session_start();
include 'koneksi.php';

$error = "";

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Mengambil data user berdasarkan email
   $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);

    // Memeriksa password
    if ($data && password_verify($password, $data['password'])) {

        $_SESSION['user_id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];

        // Redirect ke halaman utama JobListing
        header("Location: index.php");
        exit;

    } else {
        $error = "Email atau password salah!";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login JobListing</title>

    <!-- CSS Template JobListing -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        #header {
            position: fixed !important;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999 !important;
            background-color: rgba(124, 105, 239, 0.95) !important; /* Warna ungu berlatar */
            backdrop-filter: blur(8px);
            padding: 15px 0 !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15) !important;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">

                <div id="logo">
                    <a href="index.php">
                        <img src="img/logo.png" alt="JobListing">
                    </a>
                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li>
                            <a href="index.php">Home</a>
                        </li>

                        <li>
                            <a href="register.php">Signup</a>
                        </li>

                        <li class="menu-active">
                            <a href="login.php">Login</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </header>

    <!-- Banner -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>

        <div class="container">
            <div class="row d-flex align-items-center justify-content-center"
                 style="min-height: 300px; padding-top: 80px;">

                <div class="banner-content col-lg-12 text-center">
                    <h1 class="text-white">
                        Login JobListing
                    </h1>

                    <p class="text-white">
                        Masuk untuk menemukan peluang kerja terbaik
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Form Login -->
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php if ($error != "") { ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>

                <form method="POST" action="">

                    <div class="form-group mb-3">
                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Masukkan email"
                            required
                        >
                    </div>

                    <div class="form-group mb-3">
                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan password"
                            required
                        >
                    </div>

                    <button
                        type="submit"
                        name="login"
                        class="btn btn-info btn-block"
                    >
                        Login
                    </button>

                </form>

                <p class="text-center mt-3">
                    Belum punya akun?
                    <a href="register.php">Daftar sekarang</a>
                </p>

            </div>
        </div>
    </div>

</body>
</html>
