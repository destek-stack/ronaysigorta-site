<?php
require_once 'config.php';
requireLogin();

$data = getData();
$page = $_GET['page'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Ranay Sigorta</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-shield-alt"></i>
                <span>Ranay Sigorta</span>
            </div>
        </div>

        <nav class="sidebar-nav">
            <a href="?page=dashboard" class="nav-item <?= $page === 'dashboard' ? 'active' : '' ?>">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
            <a href="?page=logo" class="nav-item <?= $page === 'logo' ? 'active' : '' ?>">
                <i class="fas fa-image"></i>
                <span>Logo Yönetimi</span>
            </a>
            <a href="?page=hero" class="nav-item <?= $page === 'hero' ? 'active' : '' ?>">
                <i class="fas fa-star"></i>
                <span>Ana Sayfa Hero</span>
            </a>
            <a href="?page=services" class="nav-item <?= $page === 'services' ? 'active' : '' ?>">
                <i class="fas fa-briefcase"></i>
                <span>Hizmetler</span>
            </a>
            <a href="?page=banners" class="nav-item <?= $page === 'banners' ? 'active' : '' ?>">
                <i class="fas fa-images"></i>
                <span>Banner Yönetimi</span>
            </a>
            <a href="?page=settings" class="nav-item <?= $page === 'settings' ? 'active' : '' ?>">
                <i class="fas fa-cog"></i>
                <span>Site Ayarları</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Çıkış Yap</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <header class="topbar">
            <div class="topbar-left">
                <button class="mobile-toggle" id="mobileToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h1><?= ucfirst($page) ?></h1>
            </div>
            <div class="topbar-right">
                <a href="../index.html" target="_blank" class="btn btn-outline">
                    <i class="fas fa-external-link-alt"></i>
                    Siteyi Görüntüle
                </a>
                <div class="user-info">
                    <i class="fas fa-user-circle"></i>
                    <span>Admin</span>
                </div>
            </div>
        </header>

        <div class="content">
            <?php
            $pageFile = "pages/{$page}.php";
            if (file_exists($pageFile)) {
                include $pageFile;
            } else {
                include 'pages/dashboard.php';
            }
            ?>
        </div>
    </main>

    <script src="js/admin.js"></script>
</body>
</html>
