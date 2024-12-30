<?php
session_start();
require '../includes/db.php';

// Pencarian berdasarkan plat nomor
$search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM antrian WHERE no_plat LIKE ? ORDER BY created_at ASC";
    $stmt = $conn->prepare($query);
    $searchTerm = "%$search%";
    $stmt->bind_param('s', $searchTerm);
} else {
    $query = "SELECT * FROM antrian ORDER BY created_at ASC";
    $stmt = $conn->prepare($query);
}

$stmt->execute();
$result = $stmt->get_result();

include '../includes/header.php';
?>

<div class="container" style="padding-top: 100px;">
    <h2 class="text-center">Daftar Antrian</h2>

    <!-- Form pencarian -->
    <form method="POST" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nomor plat" value="<?= htmlspecialchars($search); ?>">
    </form>

    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true): ?>
        <a href="add.php" class="btn btn-success mb-3">Tambah Antrian</a>
    <?php endif; ?>

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No Plat</th>
                <th>Jenis Kendaraan</th>
                <th>Status</th>
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['no_plat']; ?></td>
                    <td><?= $row['jenis_kendaraan']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true): ?>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
