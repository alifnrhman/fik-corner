<?php

include("connection.php");

// Fungsi untuk mengambil data dari database
function get_data($connection, $columns = '*', $table, $join = '', $where = '', $orderBy = '', $limit = '') {
    $query = "SELECT $columns FROM $table";

    if (!empty($join)) {
        $query .= " $join";
    }

    if (!empty($where)) {
        $query .= " WHERE $where";
    }

    if (!empty($orderBy)) {
        $query .= " ORDER BY $orderBy";
    }

    if (!empty($limit)) {
        $query .= " LIMIT $limit";
    }

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
        return $data;
    } else {
        return [];  // Jika tidak ada data, kembalikan array kosong
    }
}

// Fungsi untuk format tanggal menjadi penanggalan Indonesia
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