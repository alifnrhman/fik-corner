<?php
  header("Content-type: application/pdf");
  header("Content-Disposition: inline; filename=sertifikat.pdf");
  @readfile($_SERVER["DOCUMENT_ROOT"] . '/fik-corner/assets/certificate.pdf');
?>