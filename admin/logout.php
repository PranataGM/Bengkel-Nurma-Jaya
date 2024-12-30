<?php
session_start();
session_destroy(); // Hancurkan sesi
header('Location: /admin/login.php'); // Arahkan kembali ke halaman login
exit;
?>
