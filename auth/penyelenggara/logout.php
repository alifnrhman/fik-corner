<?php
   session_start();
   
   session_destroy();
   header('location: /fik-corner/penyelenggara/login');
?>