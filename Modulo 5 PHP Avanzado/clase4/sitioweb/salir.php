<?php
session_start();
mysqli_close;
session_destroy();
header("Location: index.php");
?>