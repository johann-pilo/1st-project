
<?php

session_start();
include_once "db.php";
add_service($_SESSION["id"], $_SESSION["hash"]);

$file = $_SESSION["image"];

if (file_exists($file)) {
	header ("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header('Content-Type: application/octetstream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-length: ".filesize($file));
    header("Content-disposition: attachment; filename=\"".basename($filename)."\"");
    readfile("$file");                
  }

?>
