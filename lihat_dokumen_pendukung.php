<?php
    include("connection.php");
    $id_penyelenggara = $_GET['id'];

    // Query untuk ambil data dokumen pendukung
    $query = "SELECT dokumen_pendukung FROM penyelenggara WHERE id_penyelenggara = $id_penyelenggara";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($result);

    // Simpan data ke variabel file
    $file = $data['dokumen_pendukung'];
    $filename = 'dokumen_pendukung.pdf';
    
    // Header content type
    header('Content-type: application/pdf');
    header('Content-Disposition: inline;
    filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    
    // Menampilkan file
    echo $file;

?>