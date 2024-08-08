<?php include ("db.php"); ?>


<?php

// Sayfa numarasını al, varsayılan olarak 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; // Sayfada gösterilecek veri sayısı
$offset = ($page - 1) * $limit;

// Toplam kayıt sayısını al
$total_result = mysqli_query($baglan, "SELECT COUNT(*) AS total FROM urunler");
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Verileri al
$sql = "SELECT * FROM urunler LIMIT $limit OFFSET $offset";
$result = mysqli_query($baglan, $sql);

$urunler = array();
while ($row = mysqli_fetch_assoc($result)) {
    $urunler[] = $row;
}

$response = array(
    'data' => $urunler,
    'total_pages' => $total_pages
);

echo json_encode($response);


mysqli_close($baglan);
?>
