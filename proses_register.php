<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
    if (mysqli_query($koneksi, $query)) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
