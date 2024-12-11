<?php
include('connection.php');
session_start();
date_default_timezone_set("Asia/Bangkok");

$judul_berita = $_POST['judul_berita'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];
$foto = file_get_contents($_FILES['foto']['tmp_name']);
$penulis = $_SESSION['nama'];

// Cek apakah sudah terdaftar
$sql = "SELECT * FROM berita WHERE judul_berita = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $judul_berita);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $sql1 = "INSERT INTO berita (judul_berita, deskripsi, kategori, foto, penulis) VALUES (?, ?, ?, ?, ?)";
    $stmt1 = $connection->prepare($sql1);
    $stmt1->bind_param("sssss",
    $judul_berita, $deskripsi, $kategori, $foto, $penulis);
    $stmt1->execute();

    if ($stmt1->affected_rows > 0) {
      echo "<script>
            alert('Berita berhasil ditambahkan!');
            window.location.href = 'dashboard_admin';
         </script>";
         
        $stmt2->close();

    } else {
        echo "<script>
            alert('Gagal menambah berita!');
            window.location.href = 'dashboard_admin';
        </script>";
    }
    $stmt1->close();
} else {
    echo "<script>
            alert('Berita sudah ada!');
            window.location.href = 'dashboard_admin';
        </script>";
}
$stmt->close();
$connection->close();