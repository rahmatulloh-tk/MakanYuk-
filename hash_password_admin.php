<?php
include 'koneksi.php';

$admins = [
    ['username' => 'admin1', 'password' => 'admin123'],
    ['username' => 'superadmin', 'password' => 'super123']
];

foreach ($admins as $admin) {
    $hashed = password_hash($admin['password'], PASSWORD_DEFAULT);
    $sql = "UPDATE admin SET password = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashed, $admin['username']);
    $stmt->execute();
}

echo "Password berhasil di-hash!";
?>
