<?php
include($_SERVER["DOCUMENT_ROOT"] . '/fik-corner/includes/connection.php');
session_start();

$nim = $_SESSION['nim'];
$id_kegiatan = $_GET['id'];

// Cek apakah sudah mengikuti kegiatan
$sql = "SELECT * FROM mhs_kegiatan WHERE nim = ? AND id_kegiatan = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $nim, $id_kegiatan);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {

    $sql1 = "INSERT INTO mhs_kegiatan (nim, id_kegiatan) VALUES (?, ?)";
    $stmt1 = $connection->prepare($sql1);
    $stmt1->bind_param("ss", $nim, $id_kegiatan);
    $stmt1->execute();

    if ($stmt1->affected_rows > 0) {
        $sql2 = "UPDATE kegiatan SET jumlah_peserta = jumlah_peserta + 1 WHERE id_kegiatan = ?";
        $stmt2 = $connection->prepare($sql2);
        $stmt2->bind_param("i", $id_kegiatan);
        $stmt2->execute();

        if ($stmt2->affected_rows > 0) {
            echo "<script>
                    alert('Berhasil mendaftar kegiatan!');
                    window.location.href = '/fik-corner/kegiatan-saya';
                </script>";
        } else {
            echo "<script>
                alert('Gagal update kegiatan!');
                window.location.href = '/fik-corner/kegiatan';
            </script>";
        }
        $stmt2->close();
    } else {
        echo "<script>
            alert('Gagal mendaftar kegiatan!');
            window.location.href = '/fik-corner/kegiatan';
        </script>";
    }
    $stmt1->close();
} else {
    echo "<script>
            alert('Anda sudah terdaftar pada kegiatan ini!');
            window.location.href = '/fik-corner/kegiatan';
        </script>";
}
$stmt->close();
$connection->close();
?>