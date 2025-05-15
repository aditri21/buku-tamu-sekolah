<?php
include 'includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $instansi = $koneksi->real_escape_string($_POST['instansi']);
    $tujuan = $koneksi->real_escape_string($_POST['tujuan']);
    $tanggal = date('Y-m-d');
    $waktu = date('H:i:s');

    $stmt = $koneksi->prepare("INSERT INTO buku_tamu (nama, instansi, tujuan, tanggal, waktu) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $instansi, $tujuan, $tanggal, $waktu);
    
    if ($stmt->execute()) {
        header("Location: index.php?success=1");
    } else {
        die("Error: " . $stmt->error);
    }
    
    $stmt->close();
    $koneksi->close();
}
?>