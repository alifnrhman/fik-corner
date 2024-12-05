<?php

include("connection.php");

// Fungsi untuk mengambil data dari database
function get_data($connection, $columns = '*', $table, $join = '', $where = '', $orderBy = '', $limit = '') {
    // Membangun query dasar
    $query = "SELECT $columns FROM $table";

    // Menambahkan klausa JOIN jika diberikan
    if (!empty($join)) {
        $query .= " $join";
    }

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
        // Menyimpan data dalam bentuk array
        $data = [];
        while ($row = $result->fetch_assoc()) {
            // Mengubah format foto BLOB menjadi base64
            if (isset($row['foto']) && !empty($row['foto'])) {
                $row['foto'] = 'data:image/jpeg;base64,' . base64_encode($row['foto']);
            }
            if (isset($row['logo']) && !empty($row['logo'])) {
                $row['logo'] = 'data:image/jpeg;base64,' . base64_encode($row['logo']);
            }
            $data[] = $row;
        }
        return $data;  // Mengembalikan data
    } else {
        return [];  // Tidak ada data, kembalikan array kosong
    }
}


function format_tanggal($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$format = explode('-', $tanggal);
	
	// Variabel format[0] = tanggal
	// Variabel format[1] = bulan
	// Variabel format[2] = tahun
 
	return $format[2] . ' ' . $bulan[ (int)$format[1] ] . ' ' . $format[0];
}