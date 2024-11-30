<?php

include("connection.php");

// Fungsi untuk mengambil data dari database
function get_data($connection, $columns = '*', $table, $where = '', $orderBy = '', $limit = '') {
    // Membangun query dasar
    $query = "SELECT $columns FROM $table";
    
    // Menambahkan kondisi WHERE jika diberikan
    if (!empty($where)) {
        $query .= " WHERE $where";
    }
    
    // Menambahkan kondisi ORDER BY jika diberikan
    if (!empty($orderBy)) {
        $query .= " ORDER BY $orderBy";
    }
    
    // Menambahkan LIMIT jika diberikan
    if (!empty($limit)) {
        $query .= " LIMIT $limit";
    }
    
    // Menjalankan query
    $result = $connection->query($query);
    
    // Mengecek apakah ada hasil
    if ($result->num_rows > 0) {
        // Menyimpan data dalam bentuk array asosiatif
        $data = [];
        while ($row = $result->fetch_assoc()) {
            // Mengubah kolom foto BLOB menjadi base64 (untuk ditampilkan langsung di HTML)
            if (isset($row['foto']) && !empty($row['foto'])) {
                $row['foto'] = 'data:image/jpeg;base64,' . base64_encode($row['foto']);  // Mengubah BLOB menjadi base64
            }
            $data[] = $row;
        }
        return $data;  // Mengembalikan data
    } else {
        return [];  // Tidak ada data, kembalikan array kosong
    }
}
?>