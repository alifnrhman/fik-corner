<?php
  header("Content-type: application/pdf"); //Menentukan tipe konten sebagai PDF
  header("Content-Disposition: inline; filename=sertifikat.pdf"); //Menyuruh browser untuk menampilkan PDF dalam halaman, dengan nama file 'sertifikat.pdf'
  @readfile($_SERVER["DOCUMENT_ROOT"] . '/fik-corner/assets/certificate.pdf');// Membaca dan mengirim file PDF ke browser untuk ditampilkan
?>