<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = getData();
    
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
        $uploaded = uploadFile($_FILES['logo'], 'uploads/logo/');
        if ($uploaded) {
            // Delete old logo
            if (isset($data['site']['logo'])) {
                deleteFile($data['site']['logo']);
            }
            $data['site']['logo'] = $uploaded;
            saveData($data);
            $success = 'Logo başarıyla güncellendi!';
        }
    }
}

$data = getData();
$currentLogo = $data['site']['logo'] ?? 'uploads/logo/logo.png';
?>

<?php if (isset($success)): ?>
    <div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>

<div class="card">
    <div class="card-header">Logo Yönetimi</div>
    
    <?php if (file_exists('../' . $currentLogo)): ?>
        <div class="image-preview">
            <img src="../<?= $currentLogo ?>" alt="Mevcut Logo">
        </div>
    <?php endif; ?>
    
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Yeni Logo Yükle</label>
            <div class="image-upload" onclick="document.getElementById('logo').click()">
                <i class="fas fa-cloud-upload-alt" style="font-size: 48px; color: var(--primary); margin-bottom: 12px;"></i>
                <p>Tıklayarak logo yükleyin</p>
                <small>PNG veya JPG formatında, max 2MB</small>
            </div>
            <input type="file" id="logo" name="logo" accept="image/*" style="display: none;" onchange="this.form.submit()">
        </div>
    </form>
</div>
