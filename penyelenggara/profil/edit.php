<?php
include($_SERVER["DOCUMENT_ROOT"] . '/fik-corner/includes/connection.php');
session_start();

$nama_penyelenggara = isset($_POST['nama_penyelenggara']) ? $_POST['nama_penyelenggara'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$nomor_telepon = isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : null;
$password_lama = isset($_POST['password_lama']) ? $_POST['password_lama'] : null;
$password_baru = isset($_POST['password_baru']) ? $_POST['password_baru'] : null;
$ulangi_password_baru = isset($_POST['ulangi_password_baru']) ? $_POST['ulangi_password_baru'] : null;
$logo = isset($_FILES['logo']) ? $_FILES['logo']['tmp_name'] : null;

$size = $_FILES['logo']['size'];
$max_size = 10_000_000; // Max 10MB
    
if (isset($logo) && $size > $max_size) {
    setCookie('error_profil', 'Ukuran file terlalu besar! (maks. 10MB)', time() + 60, '/');
    header('location: /fik-corner/penyelenggara/profil');
}

$updates = [];
$params = [];
$types = '';

if ($logo) {
    $logo = file_get_contents($logo);
    $updates[] = 'logo = ?';
    $params[] = $logo;
    $types .= 's';
}

if ($nama_penyelenggara) {
    $updates[] = 'nama_penyelenggara = ?';
    $params[] = $nama_penyelenggara;
    $types .= 's';
}

if ($email) {
    $updates[] = 'email = ?';
    $params[] = $email;
    $types .= 's';
}

if ($nomor_telepon) {
    $updates[] = 'nomor_telepon = ?';
    $params[] = $nomor_telepon;
    $types .= 's';
}

if ($password_lama && $password_baru && $ulangi_password_baru) {
    if ($password_baru !== $ulangi_password_baru) {
        echo "<script>
            alert('Password tidak cocok!');
            window.location.href = '/fik-corner/penyelenggara/profil/';
        </script>";
        exit();
    }

    $sql = "SELECT password FROM penyelenggara WHERE id_penyelenggara = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $_SESSION['id_penyelenggara']);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($password_lama, $hashed_password)) {
        echo "<script>
            alert('Password lama salah!');
            window.location.href = '/fik-corner/penyelenggara/profil/';
        </script>";
        exit();
    }

    $hashed_password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
    $updates[] = 'password = ?';
    $params[] = $hashed_password_baru;
    $types .= 's';
}

if (!empty($updates)) {
    $sql = "UPDATE penyelenggara SET " . implode(', ', $updates) . " WHERE id_penyelenggara = ?";
    $params[] = $_SESSION['id_penyelenggara'];
    $types .= 's';

    $stmt = $connection->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        if ($logo) {
            $_SESSION['logo_penyelenggara'] = $logo = 'data:image/jpeg;base64,' . base64_encode($logo);
        }
        setcookie('error_profil', '', time() - 3600, '/');
        echo "<script>
                alert('Berhasil mengubah profil!');
                window.location.href = '/fik-corner/penyelenggara/profil/';
            </script>";
    } else {
        echo "<script>
                alert('Gagal mengubah profil!');
                window.location.href = '/fik-corner/penyelenggara/profil/';
            </script>";
    }

    $stmt->close();
}

$connection->close();
?>