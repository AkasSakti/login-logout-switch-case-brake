<?php
session_start(); // Mulai sesi

// Cek apakah user sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginptswcb.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Input Hari</title>
</head>
<body>

    <h2>Selamat Datang di Halaman Input SWCB</h2>

    <!-- Form untuk input hari -->
    <form method="POST" action="">
        <label for="hari">Masukkan Nama Hari:</label>
        <input type="text" id="hari" name="hari" placeholder="Contoh: Senin">
        <button type="submit">Kirim</button>
    </form>

    <?php
    // Cek apakah form sudah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil inputan user dari form
        $hari = $_POST['hari'];

        // Ubah inputan ke huruf besar awal (menghindari kesalahan pengetikan)
        $hari = ucfirst(strtolower($hari));

        // Switch-case untuk mencocokkan inputan dengan nama hari
        switch ($hari) {
            case "Senin":
                echo "Hari ini adalah Senin";
                break;
            case "Selasa":
                echo "Hari ini adalah Selasa";
                break;
            case "Rabu":
                echo "Hari ini adalah Rabu";
                break;
            case "Kamis":
                echo "Hari ini adalah Kamis";
                break;
            case "Jumat":
                echo "Hari ini adalah Jumat";
                break;
            case "Sabtu":
                echo "Hari ini adalah Sabtu";
                break;
            case "Minggu":
                echo "Hari ini adalah Minggu";
                break;
            default:
                echo "Hari tidak dikenali, pastikan Anda mengetik dengan benar.";
                break;
        }
    }
    ?>

    <!-- Tombol logout -->
    <form method="POST" action="">
        <button type="submit" name="logout">Logout</button>
    </form>

    <?php
    // Jika tombol logout ditekan
    if (isset($_POST['logout'])) {
        // Hancurkan sesi dan redirect ke login.php
        session_destroy();
        header("Location: loginptswcb.php");
        exit();
    }
    ?>

</body>
</html>
