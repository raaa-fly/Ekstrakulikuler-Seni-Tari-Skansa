<?php
include 'koneksi.pendaftaran.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $kelas = $_POST['kelas'];
    $alasan = $_POST['alasan'];

    $stmt = $conn->prepare("INSERT INTO pendaftaran (nama, email, no_hp, kelas, alasan) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $email, $no_hp, $kelas, $alasan);

    if ($stmt->execute()) {
        echo "Pendaftaran berhasil!";
    } else {
        echo "Pendaftaran gagal: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
