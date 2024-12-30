<?php include 'includes/header.php'; ?>
<div class="hero text-center text-white d-flex align-items-center justify-content-center" style="min-height: 100vh; background: linear-gradient(45deg, #007bff, #6c63ff);">
    <div>
        <h1 class="display-4 fw-bold" style="animation: fadeIn 1.5s;">Selamat Datang di Bengkel Nurma Jaya</h1>
        <p class="lead mt-3" style="animation: fadeIn 2s;">Solusi terbaik untuk kendaraan Anda, cepat, tepat, dan terpercaya.</p>
    </div>
</div>
<div id="why-choose-us" class="container mt-5">
    <h2 class="text-center mb-4 fw-bold">Kenapa Memilih Kami?</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="icon-box p-4 rounded shadow-sm" style="transition: transform 0.3s; border: 1px solid #e3e3e3;">
                <i class="bi bi-tools" style="font-size: 4rem; color: #007bff;"></i>
                <h4 class="mt-3">Layanan Profesional</h4>
                <p>Teknisi berpengalaman untuk semua kebutuhan kendaraan Anda.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="icon-box p-4 rounded shadow-sm" style="transition: transform 0.3s; border: 1px solid #e3e3e3;">
                <i class="bi bi-clock-history" style="font-size: 4rem; color: #007bff;"></i>
                <h4 class="mt-3">Cepat dan Tepat</h4>
                <p>Proses perbaikan yang cepat tanpa mengorbankan kualitas.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="icon-box p-4 rounded shadow-sm" style="transition: transform 0.3s; border: 1px solid #e3e3e3;">
                <i class="bi bi-star-fill" style="font-size: 4rem; color: #007bff;"></i>
                <h4 class="mt-3">Kepuasan Terjamin</h4>
                <p>Kami menjamin kepuasan pelanggan dengan layanan terbaik.</p>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>

<style>
    .hero {
        animation: fadeIn 1.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .icon-box:hover {
        transform: scale(1.1);
        background-color: #f8f9fa;
    }

    .icon-box:hover i {
        color: #6c63ff;
    }
</style>
