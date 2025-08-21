<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form dan mengamankan input
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Query untuk memeriksa username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    // Cek apakah username ada di database
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Set session dan redirect ke halaman utama
            $_SESSION['username'] = $username;
            header("Location: login.php");
            exit; // Menghentikan eksekusi setelah redirect
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
} else {
    header("Location: login.php"); // Jika akses langsung tanpa POST, kembali ke login
    exit;
}
?>
