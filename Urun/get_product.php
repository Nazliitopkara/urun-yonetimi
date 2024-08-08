<?php include ("db.php"); ?>

<?php

// Ürün ID'sini al
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Ürün ID'si geçerli değilse hata döndür
if ($id <= 0) {
    echo json_encode(array('error' => 'Geçersiz ürün ID\'si.'));
    $baglan->close();
    exit;
}

// Prepared statement ile ürün detaylarını al
$sql = $baglan->prepare("SELECT * FROM urunler WHERE id = ?");
$sql->bind_param("i", $id);
$sql->execute();
$result = $sql->get_result();

if ($result) {
    $urun = $result->fetch_assoc();

    if ($urun) {
        // JSON formatında veri döndür
        echo json_encode($urun);
    } else {
        echo json_encode(array('error' => 'Ürün bulunamadı.'));
    }
} else {
    echo json_encode(array('error' => 'Sorgu hatası.'));
}

// Bağlantıyı kapat
$sql->close();
$baglan->close();
?>
