<?php
include($_SERVER["DOCUMENT_ROOT"] . '/fik-corner/includes/connection.php');
session_start();

//Memulai sesi untuk mendapatkan informasi pengguna yang login 
$nim = $_SESSION['nim'];
$id_kegiatan = $_GET['id'];

// Mengambil NIM dari sesi pengguna yang login 
$sql = "SELECT * FROM mhs_kegiatan WHERE nim = ? AND id_kegiatan = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $nim, $id_kegiatan);
$stmt->execute();
$result = $stmt->get_result();

//Mengecek apakah mahasiswa sudah terdaftar pada kegiatan yang dimaksud 
if ($result->num_rows == 0) {

    //Jika mahasiswa belum terdaftar dalam kegiatan, maka mamsukkan data pendaftaran mahasiswa ke dalam tabel mhs_kegiatan 
    $sql1 = "INSERT INTO mhs_kegiatan (nim, id_kegiatan) VALUES (?, ?)";
    $stmt1 = $connection->prepare($sql1);
    $stmt1->bind_param("ss", $nim, $id_kegiatan);
    $stmt1->execute();

    //Mengecek apakah data berhasil dimasukkan 
    if ($stmt1->affected_rows > 0) {
        //Jika berhasil, update jumlah peserta pada tabel kegiatan 
        $sql2 = "UPDATE kegiatan SET jumlah_peserta = jumlah_peserta + 1 WHERE id_kegiatan = ?";
        $stmt2 = $connection->prepare($sql2);
        $stmt2->bind_param("i", $id_kegiatan);
        $stmt2->execute();

        //Mengecek apakah update jumlah peserta berhasil 
        if ($stmt2->affected_rows > 0) {
            //Menampilkan pesan sukses dan mengarahkan ke halaman kegiatan saya 
            echo "<script>
                    alert('Berhasil mendaftar kegiatan!');
                    window.location.href = '/fik-corner/kegiatan-saya';
                </script>";
        } else {
            //Jika gagal memperbarui jumlah peserta, tampilkan pesan error 
            echo "<script>
                alert('Gagal update kegiatan!');
                window.location.href = '/fik-corner/kegiatan';
            </script>";
        }
        $stmt2->close();
    } else {
        //Jika gagal memasukkan data pendaftaran mahasiswa, tampilkan pesan error 
        echo "<script>
            alert('Gagal mendaftar kegiatan!');
            window.location.href = '/fik-corner/kegiatan';
        </script>";
    }
    $stmt1->close();
} else {
    //Jika mahasiswa sudah terdaftar pada kegiatan ini, tampilkan pesan bahwa mereka sudah terdaftar di kegiatan tersebut
    echo "<script>
            alert('Anda sudah terdaftar pada kegiatan ini!');
            window.location.href = '/fik-corner/kegiatan';
        </script>";
}
$stmt->close();
$connection->close();
?>