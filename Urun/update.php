<?php include ("db.php"); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Form verilerini al ve isset ile kontrol et
    $id = $_POST['id'];
    
     include ("form_image.php"); 


    // Veritabanında güncelleme sorgusu
    $sql = "UPDATE urunler SET 
                urun_baslik='$urun_baslik', urun_ek_bilgi_baslik='$urun_ek_bilgi_baslik', urun_ek_bilgi_aciklama='$urun_ek_bilgi_aciklama', 
                meta_title='$meta_title', meta_keywords='$meta_keywords', meta_description='$meta_description', seo_adresi='$seo_adresi', 
                urun_aciklama='$urun_aciklama', video_embed_kodu='$video_embed_kodu', urun_kodu='$urun_kodu', miktar='$miktar', 
                sepet_indirim='$sepet_indirim', vergi_orani='$vergi_orani', satis_fiyati_tl='$satis_fiyati_tl', satis_fiyati_usd='$satis_fiyati_usd', 
                satis_fiyati_eur='$satis_fiyati_eur', ikinci_satis_fiyati='$ikinci_satis_fiyati', stoktan_dus='$stoktan_dus', durum='$durum', 
                ozellik_bolumu='$ozellik_bolumu', yeni_urun_sure='$yeni_urun_sure', siralama='$siralama', anasayfa_goster='$anasayfa_goster', 
                yeni_urun='$yeni_urun', taksit='$taksit', garanti_suresi='$garanti_suresi', musteri_grubu='$musteri_grubu', oncelik='$oncelik', 
                indirim_fiyati_tl='$indirim_fiyati_tl', indirim_fiyati_usd='$indirim_fiyati_usd', indirim_fiyati_eur='$indirim_fiyati_eur', 
                baslangic_tarihi='$baslangic_tarihi', bitis_tarihi='$bitis_tarihi', urun_ana_resmi='$urun_ana_resmi' 
            WHERE id='$id'";

    if (mysqli_query($baglan, $sql)) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
           window.onload = function() {
               Swal.fire({
                   title: "Başarılı",
                   text: "Güncelleme işlemi başarı ile tamamlanmıştır",
                   icon: "success",
                   showConfirmButton: false,
                   timer: 2000
               }).then(() => {
                   window.location.href = "http://localhost:8000/daynexc1/"; // İleri sayfaya yönlendir
               });
           }
         </script>';
    } else {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
            window.onload = function() {
                Swal.fire({
                    title: "Hata",
                    text: "Güncelleme işlemi başarısız oldu",
                    icon: "error",
                    showConfirmButton: true
                });
            }
          </script>';
    }
}

mysqli_close($baglan);
?>