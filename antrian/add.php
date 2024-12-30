<!-- add.php -->
<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: ../admin/login.php');
    exit;
}

require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $no_plat = $_POST['no_plat'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];

    $query = "INSERT INTO antrian (nama, no_plat, jenis_kendaraan) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $nama, $no_plat, $jenis_kendaraan);
    $stmt->execute();

    header('Location: index.php');
    exit;
}
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Tambah Antrian</h2>
    <form method="POST" class="mt-3">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>No Plat</label>
            <input type="text" name="no_plat" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jenis Kendaraan</label>
            <input type="text" name="jenis_kendaraan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success btn-block">Tambah</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
