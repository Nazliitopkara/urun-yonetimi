<?php

$urun_baslik = isset($_POST['turkce-urun-baslik']) ? $_POST['turkce-urun-baslik'] : '';
$urun_ek_bilgi_baslik = isset($_POST['turkce-urun-ek-bilgi-baslik']) ? $_POST['turkce-urun-ek-bilgi-baslik'] : '';
$urun_ek_bilgi_aciklama = isset($_POST['turkce-urun-ek-bilgi-aciklama']) ? $_POST['turkce-urun-ek-bilgi-aciklama'] : '';
$meta_title = isset($_POST['turkce-meta-title']) ? $_POST['turkce-meta-title'] : '';
$meta_keywords = isset($_POST['turkce-meta-keywords']) ? $_POST['turkce-meta-keywords'] : '';
$meta_description = isset($_POST['turkce-meta-description']) ? $_POST['turkce-meta-description'] : '';
$seo_adresi = isset($_POST['turkce-seo-adresi']) ? $_POST['turkce-seo-adresi'] : '';
$urun_aciklama = isset($_POST['turkce-urun-aciklama']) ? $_POST['turkce-urun-aciklama'] : '';
$video_embed_kodu = isset($_POST['turkce-video-embed-kodu']) ? $_POST['turkce-video-embed-kodu'] : '';
$urun_kodu = isset($_POST['urun-kodu']) ? $_POST['urun-kodu'] : '';
$miktar = isset($_POST['miktar']) ? $_POST['miktar'] : '';
$sepet_indirim = isset($_POST['sepet-indirim']) ? $_POST['sepet-indirim'] : '';
$vergi_orani = isset($_POST['vergi-orani']) ? $_POST['vergi-orani'] : '';
$satis_fiyati_tl = isset($_POST['satis-fiyati-tl']) ? $_POST['satis-fiyati-tl'] : '';
$satis_fiyati_usd = isset($_POST['satis-fiyati-usd']) ? $_POST['satis-fiyati-usd'] : '';
$satis_fiyati_eur = isset($_POST['satis-fiyati-eur']) ? $_POST['satis-fiyati-eur'] : '';
$ikinci_satis_fiyati = isset($_POST['ikinci-satis-fiyati']) ? $_POST['ikinci-satis-fiyati'] : '';
$stoktan_dus = isset($_POST['stoktan-dus']) ? $_POST['stoktan-dus'] : '';
$durum = isset($_POST['durum']) ? $_POST['durum'] : '';
$ozellik_bolumu = isset($_POST['ozellik-bolumu']) ? $_POST['ozellik-bolumu'] : '';
$yeni_urun_sure = isset($_POST['yeni-urun-sure']) ? $_POST['yeni-urun-sure'] : '';
$siralama = isset($_POST['siralama']) ? $_POST['siralama'] : '';
$anasayfa_goster = isset($_POST['anasayfa-goster']) ? $_POST['anasayfa-goster'] : '';
$yeni_urun = isset($_POST['yeni-urun']) ? $_POST['yeni-urun'] : '';
$taksit = isset($_POST['taksit']) ? $_POST['taksit'] : '';
$garanti_suresi = isset($_POST['garanti-suresi']) ? $_POST['garanti-suresi'] : '';
$musteri_grubu = isset($_POST['musteri']) ? $_POST['musteri'] : '';
$oncelik = isset($_POST['oncelik']) ? $_POST['oncelik'] : '';
$indirim_fiyati_tl = isset($_POST['tl']) ? $_POST['tl'] : '';
$indirim_fiyati_usd = isset($_POST['dolar']) ? $_POST['dolar'] : '';
$indirim_fiyati_eur = isset($_POST['euro']) ? $_POST['euro'] : '';
$baslangic_tarihi = isset($_POST['baslangic-tarihi']) ? $_POST['baslangic-tarihi'] : '';
$bitis_tarihi = isset($_POST['bitis-tarihi']) ? $_POST['bitis-tarihi'] : '';

// Resim yükleme işlemi
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Varsayılan resim
$urun_ana_resmi = "assets/img/kamera.png";

if (isset($_FILES["urun_ana_resmi"]) && $_FILES["urun_ana_resmi"]["error"] == UPLOAD_ERR_OK) {
    $target_file = $target_dir . basename($_FILES["urun_ana_resmi"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Resmin gerçek bir resim olup olmadığını kontrol et
    $check = getimagesize($_FILES["urun_ana_resmi"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Dosya boyutunu kontrol et
    if ($_FILES["urun_ana_resmi"]["size"] > 1000000) {
        echo "Dosya Boyutunuz Çok Büyük";
        $uploadOk = 0;
    }

    // İzin verilen dosya formatlarını kontrol et
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Üzgünüz, yalnızca JPG, JPEG, PNG & GIF dosyaları yükleyebilirsiniz.";
        $uploadOk = 0;
    }

    // Hata yoksa dosyayı yükle
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["urun_ana_resmi"]["tmp_name"], $target_file)) {
            $urun_ana_resmi = basename($_FILES["urun_ana_resmi"]["name"]);
        } else {
            echo "Dosyayı yüklerken hata oluştu.";
        }
    }
}
?>