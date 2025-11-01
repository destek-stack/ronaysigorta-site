<?php
// Admin Panel Configuration
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', password_hash('ranay2024', PASSWORD_DEFAULT)); // Değiştirin!

// Paths
define('DATA_FILE', __DIR__ . '/data.json');
define('UPLOAD_DIR', __DIR__ . '/../uploads/');
define('IMAGES_DIR', __DIR__ . '/../images/');

// Session
session_start();

// Helper Functions
function isLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

function getData() {
    if (!file_exists(DATA_FILE)) {
        return [];
    }
    return json_decode(file_get_contents(DATA_FILE), true);
}

function saveData($data) {
    return file_put_contents(DATA_FILE, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function uploadFile($file, $directory = 'uploads/') {
    $uploadDir = __DIR__ . '/../' . $directory;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = time() . '_' . basename($file['name']);
    $targetPath = $uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return $directory . $fileName;
    }

    return false;
}

function deleteFile($path) {
    $fullPath = __DIR__ . '/../' . $path;
    if (file_exists($fullPath)) {
        unlink($fullPath);
        return true;
    }
    return false;
}
?>
