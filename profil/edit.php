<?php
//Mengimpor file koneksi ke database
include($_SERVER["DOCUMENT_ROOT"] . '/fik-corner/includes/connection.php');
session_start(); //Memulai sesi 

//Mengambil data input dari form (POST) dan file yang diunggah (FILES)
$nomor_telepon = isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : null;
$password_lama = isset($_POST['password_lama']) ? $_POST['password_lama'] : null;
$password_baru = isset($_POST['password_baru']) ? $_POST['password_baru'] : null;
$ulangi_password_baru = isset($_POST['ulangi_password_baru']) ? $_POST['ulangi_password_baru'] : null;
$foto = isset($_FILES['foto']) ? $_FILES['foto']['tmp_name'] : null;

//Memeriksa ukuran foto agar tidak melebihi batas maksimum (10MB)
$size = $_FILES['foto']['size'];
$max_size = 10_000_000; // Max 10MB
    
if (isset($foto) && $size > $max_size) {
    //Jika ukuran file melebihi batas, atur cookie error dan arahkan kembali ke halaman profil 
    setCookie('error_profil', 'Ukuran file terlalu besar! (maks. 10MB)', time() + 60, '/');
    header('location: /fik-corner/profil');
}

//variabel untuk menyimpan data yang akan diupdate ke database
$updates = [];
$params = [];
$types = ''; //Menyimpan tipe data parameter (s = string)

//Jika ada file foto yang diunggah, baca isi file dan tambahkan ke data update
if ($foto) {
    $foto = file_get_contents($foto); //Membaca konten file sebagai string
    $updates[] = 'foto = ?';
    $params[] = $foto;
    $types .= 's'; //Tipe string 
}

//Jika nomor telepon diinputkan, tambahkan ke data update 
if ($nomor_telepon) {
    $updates[] = 'nomor_telepon = ?';
    $params[] = $nomor_telepon;
    $types .= 's';
}

//Jika password lama, password baru, dan konfirmasi password baru yang diinputkan 
if ($password_lama && $password_baru && $ulangi_password_baru) {
    //Periksa apakah password baru dan konfirmasi cocok 
    if ($password_baru !== $ulangi_password_baru) {
        echo "<script>
            alert('Password tidak cocok!');
            window.location.href = '/fik-corner/profil/';
        </script>";
        exit();
    }

    //Ambil password lama dari database untuk diverifikasi 
    $sql = "SELECT password FROM users WHERE nim = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $_SESSION['nim']); //Mengambil nim dari sesi yang sedang berjalan 
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    //Verifikasi apakah password lama yang dimasukkan cocok dengan hash di database
    if (!password_verify($password_lama, $hashed_password)) {
        echo "<script>
            alert('Password lama salah!');
            window.location.href = '/fik-corner/profil/';
        </script>";
        exit();
    }

    //Hash password baru sebelum disimpan ke database
    $hashed_password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
    $updates[] = 'password = ?';
    $params[] = $hashed_password_baru;
    $types .= 's';
}

    //Jika ada data yang harus diupdate 
if (!empty($updates)) {
    //Buat query sql dinamis berdasarkan data yang ingin diupdate
    $sql = "UPDATE users SET " . implode(', ', $updates) . " WHERE nim = ?";
    $params[] = $_SESSION['nim'];
    $types .= 's'; //Tambahkan tipe string untuk NIM 
    
    //Siapkan statement SQL
    $stmt = $connection->prepare($sql);
    $stmt->bind_param($types, ...$params); //Masukkan parameter ke statement 
    $stmt->execute();

    //Periksa apakah ada baris yang diupdate
    if ($stmt->affected_rows > 0) {
        //Jika foto diupdate, simpan juga ke sesi 
        if ($foto) {
            $_SESSION['foto_mahasiswa'] = $foto = 'data:image/jpeg;base64,' . base64_encode($foto);
        }
        //Hapus error jika ada dan tampilkan pesan sukses 
        setcookie('error_profil', '', time() - 3600, '/');
        echo "<script>
                    alert('Berhasil mengubah profil!');
                    window.location.href = '/fik-corner/profil/';
                </script>";
    } else {
        //Jika tidak ada perubahan data, tampilkan pesan gagal 
        echo "<script>
            alert('Gagal mengubah profil!');
            window.location.href = '/fik-corner/profil/';
        </script>";
    }

    //Tutup statement SQL
    $stmt->close();
}

//Tutup koneksi database 
$connection->close();
?>