<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/connection.php');
    $id_penyelenggara = $_GET['id'];

    $stmt = $connection->prepare("SELECT dokumen_pendukung FROM penyelenggara WHERE id_penyelenggara = ?");
    $stmt->bind_param("i", $id_penyelenggara);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    // Simpan data ke variabel file
    $file = $data['dokumen_pendukung'];
    $filename = 'dokumen_pendukung.pdf';
    
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    
    echo $file;

    $stmt->close();
    $connection->close();
?>