<?php
$data = getData();
?>
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-value"><?= $data['stats']['experience'] ?? '25' ?>+</div>
        <div class="stat-label">Yıllık Deneyim</div>
    </div>
    <div class="stat-card">
        <div class="stat-value"><?= $data['stats']['customers'] ?? '10000' ?>+</div>
        <div class="stat-label">Mutlu Müşteri</div>
    </div>
    <div class="stat-card">
        <div class="stat-value"><?= count($data['services'] ?? []) ?></div>
        <div class="stat-label">Hizmet</div>
    </div>
    <div class="stat-card">
        <div class="stat-value"><?= count($data['banners'] ?? []) ?></div>
        <div class="stat-label">Aktif Banner</div>
    </div>
</div>

<div class="card">
    <div class="card-header">Hoş Geldiniz!</div>
    <p>Admin paneline hoş geldiniz. Sol menüden yönetmek istediğiniz bölümü seçebilirsiniz.</p>
</div>
