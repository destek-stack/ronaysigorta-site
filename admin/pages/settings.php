<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = getData();
    $data['site']['title'] = $_POST['title'] ?? '';
    $data['site']['phone'] = $_POST['phone'] ?? '';
    $data['site']['address'] = $_POST['address'] ?? '';
    $data['site']['email'] = $_POST['email'] ?? '';
    saveData($data);
    $success = 'Ayarlar kaydedildi!';
}

$data = getData();
?>

<?php if (isset($success)): ?>
    <div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>

<div class="card">
    <div class="card-header">Site Ayarları</div>
    
    <form method="POST">
        <div class="form-group">
            <label>Site Başlığı</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($data['site']['title'] ?? '') ?>" required>
        </div>
        
        <div class="form-group">
            <label>Telefon</label>
            <input type="tel" name="phone" class="form-control" value="<?= htmlspecialchars($data['site']['phone'] ?? '') ?>" required>
        </div>
        
        <div class="form-group">
            <label>E-posta</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($data['site']['email'] ?? '') ?>">
        </div>
        
        <div class="form-group">
            <label>Adres</label>
            <textarea name="address" class="form-control" required><?= htmlspecialchars($data['site']['address'] ?? '') ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Kaydet
        </button>
    </form>
</div>
