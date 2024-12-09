<?php
include('connection.php');
session_start();

$nama_kegiatan = $_POST['nama_kegiatan'];
$deskripsi_singkat = $_POST['deskripsi_singkat'];
$deskripsi_lengkap = $_POST['deskripsi_lengkap'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$lokasi = $_POST['lokasi'];
$id_penyelenggara = $_SESSION['id_penyelenggara'];
$id_kategori = $_POST['kategori'];
$foto = file_get_contents($_FILES['foto']['tmp_name']);
$biaya = $_POST['biaya'];
$jumlah_peserta = 0;
$status = "Pending";
$posted_at = "CURRENT_TIMESTAMP()";

// Cek apakah sudah terdaftar
$sql = "SELECT * FROM kegiatan WHERE nama_kegiatan = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $nama_kegiatan);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $sql1 = "INSERT INTO kegiatan (nama_kegiatan, deskripsi_singkat, deskripsi_lengkap, tanggal, waktu, lokasi, id_penyelenggara, id_kategori, foto, jumlah_peserta, biaya, status, posted_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt1 = $connection->prepare($sql1);
    $stmt1->bind_param("ssssssiisisss",
    $nama_kegiatan, $deskripsi_singkat, $deskripsi_lengkap, $tanggal, $waktu, $lokasi, $id_penyelenggara, $id_kategori, $foto, $jumlah_peserta, $biaya, $status, $posted_at);
    $stmt1->execute();

    if ($stmt1->affected_rows > 0) {
      echo "<script>
            alert('Terima kasih telah mengajukan!');
            window.location.href = 'dashboard_penyelenggara';
         </script>";
         
        $stmt2->close();

    } else {
        echo "<script>
            alert('Gagal mendaftarkan kegiatan!');
            window.location.href = 'dashboard_penyelenggara';
        </script>";
    }
    $stmt1->close();
} else {
    echo "<script>
            alert('Kegiatan sudah ada!');
            window.location.href = 'dashboard_penyelenggara';
        </script>";
}
$stmt->close();
$connection->close();