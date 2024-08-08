<?php include ("db.php"); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al ve isset ile kontrol et
   
    include ("form_image.php"); 

    // Veritabanına ekleme sorgusu
    $sql = "INSERT INTO urunler (
                urun_baslik, urun_ek_bilgi_baslik, urun_ek_bilgi_aciklama, meta_title, meta_keywords, meta_description, 
                seo_adresi, urun_aciklama, video_embed_kodu, urun_kodu, miktar, sepet_indirim, vergi_orani, satis_fiyati_tl, 
                satis_fiyati_usd, satis_fiyati_eur, ikinci_satis_fiyati, stoktan_dus, durum, ozellik_bolumu, yeni_urun_sure, 
                siralama, anasayfa_goster, yeni_urun, taksit, garanti_suresi, musteri_grubu, oncelik, 
                indirim_fiyati_tl, indirim_fiyati_usd, indirim_fiyati_eur, baslangic_tarihi, bitis_tarihi, urun_ana_resmi
            ) VALUES (
                '$urun_baslik', '$urun_ek_bilgi_baslik', '$urun_ek_bilgi_aciklama', '$meta_title', '$meta_keywords', '$meta_description', 
                '$seo_adresi', '$urun_aciklama', '$video_embed_kodu', '$urun_kodu', '$miktar', '$sepet_indirim', '$vergi_orani', '$satis_fiyati_tl', 
                '$satis_fiyati_usd', '$satis_fiyati_eur', '$ikinci_satis_fiyati', '$stoktan_dus', '$durum', '$ozellik_bolumu', '$yeni_urun_sure', 
                '$siralama', '$anasayfa_goster', '$yeni_urun', '$taksit', '$garanti_suresi', '$musteri_grubu', '$oncelik', 
                '$indirim_fiyati_tl', '$indirim_fiyati_usd', '$indirim_fiyati_eur', '$baslangic_tarihi', '$bitis_tarihi', '$urun_ana_resmi'
            )";

    if (mysqli_query($baglan, $sql)) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
           window.onload = function() {
               Swal.fire({
                   title: "Başarılı",
                   text: "Kaydınız başarı ile tamamlanmıştır",
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
                    text: "Kayıt işlemi başarısız oldu",
                    icon: "error",
                    showConfirmButton: true
                });
            }
          </script>';
    }
}

mysqli_close($baglan);
 ?>



