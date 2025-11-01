<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = getData();
    $data['hero']['title'] = $_POST['title'] ?? '';
    $data['hero']['subtitle'] = $_POST['subtitle'] ?? '';
    saveData($data);
    $success = 'Hero bölümü güncellendi!';
}
$data = getData();
?>
<?php if (isset($success)): ?>
    <div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>
<div class="card">
    <div class="card-header">Ana Sayfa Hero Bölümü</div>
    <form method="POST">
        <div class="form-group">
            <label>Başlık (HTML destekler)</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($data['hero']['title'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label>Alt Başlık</label>
            <textarea name="subtitle" class="form-control"><?= htmlspecialchars($data['hero']['subtitle'] ?? '') ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Kaydet</button>
    </form>
</div>
