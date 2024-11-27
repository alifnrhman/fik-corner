<?php

$route = isset($_GET['route']) ? basename($_GET['route'], ".php") : 'home';

$file = "pages/{$route}/{$route}.php";

// Periksa apakah file ada
if (file_exists($file)) {
    include 'templates/header.php';
    include $file;
    include 'templates/footer.php';
} else {
    // Tampilkan halaman 404 jika file tidak ditemukan
    include 'templates/header.php';
    echo '<main class="p-4"><h1 class="text-2xl font-semibold">
    Page Not Found</h1></main>';
    include 'templates/footer.php';
}