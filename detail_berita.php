<?php
session_start();

$title = "Detail Berita";
include("includes/header.php");
include("includes/functions.php");

// Periksa apakah parameter id tersedia di URL
if (isset($_GET['id'])) {
    $id_berita = $_GET['id'];

    // Validasi parameter id untuk keamanan
    $id_berita = mysqli_real_escape_string($connection, $id_berita);

    // Query data berita beserta penyelenggara berdasarkan id
    $columns = "berita.*, penyelenggara.nama_penyelenggara, penyelenggara.logo";
    $table = "berita";
    $join = "LEFT JOIN penyelenggara ON berita.id_penyelenggara = penyelenggara.id_penyelenggara";
    $where = "berita.id_berita = '$id_berita'";
    $news = get_data($connection, $columns, $table, $join, $where, "", "1");

    // Periksa apakah data ditemukan
    if (empty($news)) {
        echo "<p>Berita tidak ditemukan.</p>";
        exit;
    }

    $news = $news[0]; // Ambil data berita yang ditemukan
} else {
    echo "<p>Parameter ID tidak valid.</p>";
    exit;
}
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

    <div class="container mx-auto">
        <!-- Gambar Berita -->
        <div class="mb-8 flex justify-center">
            <img src="<?= $news['foto'] ?>" alt="<?= $news['judul_berita'] ?>" 
                 class="w-1/2 h-auto max-h-96 rounded-md shadow-lg">
        </div>

        <!-- Detail Berita -->
        <div>
            <!-- Judul Berita -->
            <h2 class="text-3xl font-bold text-gray-800 text-center"><?= $news['judul_berita'] ?></h2>

            <!-- Kategori dan Tanggal -->
            <div class="mt-4 flex justify-center space-x-3 items-center text-gray-700">
                <p class="text-lg font-bold text-primary"><?= $news['kategori'] ?></p>
                <p class="ml-3 flex items-center">
                    <i class="fa fa-calendar text-gray-500 mr-4"></i>
                    <?= format_tanggal($news['tanggal']) ?>
                </p>
            </div>

            <!-- Penyelenggara -->


            <!-- Deskripsi -->
            <div class="mt-6">
                <p class="font-bold text-gray-700">Detail Acara</p>
                <p class="text-justify text-gray-600"><?= $news['deskripsi'] ?></p>
            </div>

            <!-- Statistik -->
            <div class="mt-8 flex items-center space-x-4">
                <i class="fa-solid fa-chart-bar text-gray-600"></i>
                <p class="font-semibold text-gray-700 ml-3">Post Views: <?= $news['views'] ?? 0 ?></p>
            </div>

            <!-- Ikon Sosial Media -->
            <div class="mt-6">
                <ul class="social-icons flex justify-center space-x-4">
                    <li><a href="#" class="fa fa-facebook text-gray-700"></a></li>
                    <li><a href="#" class="fa fa-twitter text-gray-700"></a></li>
                    <li><a href="#" class="fa fa-pinterest text-gray-700"></a></li>
                    <li><a href="#" class="fa fa-linkedin text-gray-700"></a></li>
                    <li><a href="#" class="fa fa-instagram text-gray-700"></a></li>
                    <li><a href="#" class="fa fa-youtube text-gray-700"></a></li>
                </ul>
            </div>
        </div>
    </div>
</main>


<?php include("includes/footer.php"); ?>
