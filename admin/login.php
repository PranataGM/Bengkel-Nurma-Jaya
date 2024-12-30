<!-- login.php -->
<?php
session_start();
require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();

        // Membandingkan password
        if ($password === $admin['password']) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['is_admin'] = true;
            header('Location: ../antrian/index.php'); // Arahkan ke halaman antrian
            exit;
        } else {
            $error = 'Password salah!';
        }
    } else {
        $error = 'Username tidak ditemukan!';
    }
}
?>

<?php include '../includes/header.php'; ?>

<div class="container" style="padding-top: 100px; padding-bottom: 250px;">
    <h2 class="text-center mb-4">Login Admin</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" class="card p-4 shadow-sm">
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger text-center mt-3"><?= $error; ?></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
