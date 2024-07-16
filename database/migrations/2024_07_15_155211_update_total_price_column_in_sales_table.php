<?php
try {
    // Koneksi ke database (seperti langkah sebelumnya)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query untuk membuat tabel 'sales'
    $query = "
        CREATE TABLE sales (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            customer_id INT(11),
            product_id INT(11),
            quantity INT(11),
            total_price DECIMAL(12, 2),
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

    // Jalankan query
    $pdo->exec($query);

    echo "Tabel 'sales' berhasil dibuat.";
} catch (PDOException $e) {
    die("Error saat membuat tabel 'sales': " . $e->getMessage());
}
?>
