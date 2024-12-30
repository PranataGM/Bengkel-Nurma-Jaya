<?php
require '../includes/db.php';
session_start();

// Periksa apakah admin sudah login
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: ../admin/login.php'); // Arahkan ke halaman login jika belum login
    exit;
}

$id = $_GET['id'];

$query = "DELETE FROM antrian WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();

header('Location: index.php');
exit;
?>
