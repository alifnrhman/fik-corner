<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title; ?></title>
   <link href="/fik-corner/css/output.css" rel="stylesheet">
   <script src="https://kit.fontawesome.com/3102659666.js" crossorigin="anonymous"></script>
   <?php 
      if (strpos($_SERVER['REQUEST_URI'], 'penyelenggara') == true) {
         echo "<script src='/fik-corner/penyelenggara/js/scripts.js'></script>";
      } else if (strpos($_SERVER['REQUEST_URI'], 'admin') == true) {
         echo "<script src='/fik-corner/admin/js/scripts.js'></script>";
      } else {
         echo "<script src='/fik-corner/js/scripts.js'></script>";
      }
   ?>
</head>
<body class="min-h-screen flex flex-col">