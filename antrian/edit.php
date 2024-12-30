<?php
require '../includes/db.php';
session_start();

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: ../admin/login.php'); // Arahkan ke halaman login jika belum login
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM antrian WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$antrian = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $no_plat = $_POST['no_plat'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $status = $_POST['status'];

    $query = "UPDATE antrian SET nama = ?, no_plat = ?, jenis_kendaraan = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssi', $nama, $no_plat, $jenis_kendaraan, $status, $id);
    $stmt->execute();

    header('Location: index.php');
    exit;
}
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Edit Antrian</h2>
    <form method="POST" class="mt-3">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $antrian['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label>No Plat</label>
            <input type="text" name="no_plat" class="form-control" value="<?= $antrian['no_plat']; ?>" required>
        </div>
        <div class="form-group">
            <label>Jenis Kendaraan</label>
            <input type="text" name="jenis_kendaraan" class="form-control" value="<?= $antrian['jenis_kendaraan']; ?>" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Menunggu" <?= $antrian['status'] === 'Menunggu' ? 'selected' : ''; ?>>Menunggu</option>
                <option value="Selesai" <?= $antrian['status'] === 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning btn-block">Update</button>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
