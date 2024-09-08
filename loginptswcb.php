<?php
session_start(); // Mulai sesi

// Jika sudah login, redirect ke halaman inptswcb.php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: inptswcb.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login Sederhana</title>
</head>
<body>

    <!-- Form untuk login -->
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button type="submit">Login</button>
    </form>

    <?php
    // Cek apakah form sudah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Hard-coded credentials (username dan password)
        $valid_username = "admin";
        $valid_password = "12345";

        // Ambil input dari user
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Cek apakah username dan password sesuai
        if ($username === $valid_username && $password === $valid_password) {
            // Set sesi login
            $_SESSION['loggedin'] = true;

            // Redirect ke halaman inptswcb.php
            header("Location: inptswcb.php");
            exit();
        } else {
            // Jika username atau password salah
            echo "<p style='color:red;'>Username atau Password salah!</p>";
        }
    }
    ?>

</body>
</html>
