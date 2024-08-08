<?php include ("db.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Daynex - Case1</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo.png" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#urunlerModal" data-bs-toggle="modal">Ürünleri Listele</a>

      <!-- Modal HTML -->
      <div class="modal fade" id="urunlerModal" tabindex="-1" aria-labelledby="urunlerModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="urunlerModalLabel">Ürün Listesi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Türkçe Ürün Başlık</th>
                      <th>Türkçe Ürün Ek Bilgi Başlığı</th>
                      <th>Türkçe Ürün Ek Bilgi Açıklaması</th>
                      <th>Türkçe Meta Title</th>
                      <th>Türkçe Meta Keywords</th>
                      <th>Türkçe Meta Description</th>
                      <th>Türkçe Seo Adresi</th>
                      <th>Türkçe Ürün Açıklama</th>
                      <th>Türkçe Video Embed Kodu</th>
                      <th>Ürün Kodu</th>
                      <th>Miktar</th>
                      <th>Sepet Ekstra İndirim %</th>
                      <th>Vergi Oranı %</th>
                      <th>Satış Fiyatı (TL)</th>
                      <th>Satış Fiyatı ($)</th>
                      <th>Satış Fiyatı (€)</th>
                      <th>2. Satış Fiyatı (TL)</th>
                      <th>Stoktan Düş</th>
                      <th>Durum</th>
                      <th>Özellik Bölümü</th>
                      <th>Yeni Ürün Geçerlilik Süresi</th>
                      <th>Sıralama</th>
                      <th>Anasayfada Göster</th>
                      <th>Yeni Ürün</th>
                      <th>Taksit</th>
                      <th>Garanti Süresi</th>
                      <th>Ürün Ana Resmi</th>
                      <th>Müşteri Grubu</th>
                      <th>Öncelik</th>
                      <th>Yüzde İndirim Oranı Veya İndirimli Fiyatı TL</th>
                      <th>Yüzde İndirim Oranı Veya İndirimli Fiyatı $</th>
                      <th>Yüzde İndirim Oranı Veya İndirimli Fiyatı €</th>
                      <th>Başlangıç Tarihi</th>
                      <th>Bitiş Tarihi</th>
                      <th>Düzenle</th>

                    </tr>
                  </thead>
                  <tbody id="urunlerTableBody">
                    <!-- Veriler buraya eklenecek -->
                  </tbody>
                </table>
              </div>
              <div id="pagination" class="pagination">
                <!-- Sayfalama bağlantıları buraya eklenecek -->
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="assets/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1>yeni ürün ekleme formu</h1>
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Genel</button>
              <button class="nav-link" id="nav-details-tab" data-bs-toggle="tab" data-bs-target="#nav-details"
                type="button" role="tab" aria-controls="nav-details" aria-selected="false">Detaylar</button>
              <button class="nav-link" id="nav-images-tab" data-bs-toggle="tab" data-bs-target="#nav-images"
                type="button" role="tab" aria-controls="nav-images" aria-selected="false">Resimler</button>
              <button class="nav-link" id="nav-sale-tab" data-bs-toggle="tab" data-bs-target="#nav-sale" type="button"
                role="tab" aria-controls="nav-sale" aria-selected="false">İndirim</button>

            </div>
          </nav>

          <form action="baglanti.php" method="post" enctype="multipart/form-data" id="form1">
          <input type="hidden" id="urun-id" name="id">

            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="form-group">
                  <label for="turkce-urun-baslik">Türkçe Ürün Başlık <span style="color: red;">*</span></label>
                  <input type="text" id="turkce-urun-baslik" name="turkce-urun-baslik" required>
                </div>

                <div class="form-group">
                  <label for="turkce-urun-ek-bilgi-baslik">Türkçe Ürün Ek Bilgi Başlığı</label>
                  <input type="text" id="turkce-urun-ek-bilgi-baslik" name="turkce-urun-ek-bilgi-baslik">
                </div>

                <div class="form-group">
                  <label for="turkce-urun-ek-bilgi-aciklama">Türkçe Ürün Ek Bilgi Açıklaması</label>
                  <input type="text" id="turkce-urun-ek-bilgi-aciklama" name="turkce-urun-ek-bilgi-aciklama">
                </div>

                <div class="form-group">
                  <label for="turkce-meta-title">Türkçe Meta Title</label>
                  <input type="text" id="turkce-meta-title" name="turkce-meta-title">
                </div>

                <div class="form-group">
                  <label for="turkce-meta-keywords">Türkçe Meta Keywords</label>
                  <input type="text" id="turkce-meta-keywords" name="turkce-meta-keywords">
                </div>

                <div class="form-group">
                  <label for="turkce-meta-description">Türkçe Meta Description</label>
                  <input type="text" id="turkce-meta-description" name="turkce-meta-description">
                </div>

                <div class="form-group">
                  <label for="turkce-seo-adresi">Türkçe Seo Adresi</label>
                  <input type="text" id="turkce-seo-adresi" name="turkce-seo-adresi">
                  <small>Seo adresi girilmez zorunlu değişiklik girilen seo adresi geçerli olur. Girilmez ise otomatik
                    olarak Başlık kısmı referans alınarak oluşturulur.</small>
                </div>

                <div class="form-group">
                  <label for="turkce-urun-aciklama">Türkçe Ürün Açıklama</label>
                  <textarea id="turkce-urun-aciklama" name="turkce-urun-aciklama"></textarea>
                </div>

                <div class="form-group">
                  <label for="turkce-video-embed-kodu">Türkçe Video Embed Kodu</label>
                  <input type="text" id="turkce-video-embed-kodu" name="turkce-video-embed-kodu">
                  <small>Vimeo - Google Video - Youtube tarzı video sitelerinin embed kodu.</small>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                <div class="form-group">
                  <label for="urun-kodu">Ürün Kodu <span style="color: red;"> *</span></label>
                  <small>Ürünün Kodu</small>

                  <input type="text" id="urun-kodu" name="urun-kodu" required>

                </div>

                <div class="form-group">
                  <label for="miktar">Miktar (Adet)<span style="color: red;"> *</span></label>
                  <small>Ürünün kaç adet olacağını belirler. Bu miktar 0 olarak girilirse... </small>

                  <input type="number" id="miktar" name="miktar" required>
                </div>

                <div class="form-group">
                  <label for="sepet-indirim">Sepet Ekstra İndirim % <span style="color: red;"> *</span></label>
                  <small>Ürün sepet alanına seçenklerden indirim girilmiş ise indirim ona göre hesaplanır</small>

                  <select id="sepet-indirim" name="sepet-indirim" required>
                    <?php
                    for ($i = 0; $i <= 100; $i++) {
                      echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
                  </select>

                </div>

                <div class="form-group">
                  <label for="vergi-orani">Vergi Oranı % <span style="color: red;"> *</span></label>
                  <small>Ürün vergi oranı </small>
                  <input type="number" id="vergi-orani" name="vergi-orani" value="20" class="placeholder-gray" required>
                </div>

                <div class="form-group gri">
                  <label for="satis-fiyati-tl">Satış Fiyatı (TL) <span style="color: red;"> *</span></label>
                  <small>Ürünün satış fiyatı</small>
                  <input type="text" id="satis-fiyati-tl" name="satis-fiyati-tl" required>

                  <label for="satis-fiyati-usd">($) <span style="color: red;"> *</span></label>
                  <input type="text" id="satis-fiyati-usd" name="satis-fiyati-usd" required>

                  <label for="satis-fiyati-eur"> (€) <span style="color: red;"> *</span></label>
                  <input type="text" id="satis-fiyati-eur" name="satis-fiyati-eur" required>
                </div>

                <div class="form-group gri">
                  <label for="ikinci-satis-fiyati">2. Satış Fiyatı (TL) <span style="color: red;"> *</span></label>
                  <input type="text" id="ikinci-satis-fiyati" name="ikinci-satis-fiyati" required>
                </div>

                <div class="form-group">
                  <label for="stoktan-dus">Stoktan Düş <span style="color: red;"> *</span></label>
                  <select id="stoktan-dus" name="stoktan-dus" class="placeholder-gray" required>
                    <option value="evet">Evet</option>
                    <option value="hayir">Hayır</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="durum">Durum <span style="color: red;"> *</span></label>
                  <select id="durum" name="durum" class="placeholder-gray" required>
                    <option value="acik">Açık</option>
                    <option value="kapali">Kapalı</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="ozellik-bolumu">Özellik Bölümü <span style="color: red;"> *</span></label>
                  <select id="ozellik-bolumu" name="ozellik-bolumu" class="placeholder-gray" required>
                    <option value="goster">Göster</option>
                    <option value="gosterme">Gösterme</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="yeni-urun-sure">Yeni Ürün geçerlilik süresi <span style="color: red;"> *</span></label>
                  <input type="date" id="yeni-urun-sure" name="yeni-urun-sure" value="2026-08-12" required>
                </div>

                <div class="form-group">
                  <label for="siralama">Sıralama <span style="color: red;"> *</span></label>
                  <input type="number" id="siralama" name="siralama" required>
                </div>

                <div class="form-group">
                  <label for="anasayfa-goster">Anasayfada Göster <span style="color: red;"> *</span></label>
                  <select id="anasayfa-goster" name="anasayfa-goster" required>
                    <option value="evet">Evet</option>
                    <option value="hayir">Hayır</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="yeni-urun">Yeni Ürün <span style="color: red;"> *</span></label>
                  <select id="yeni-urun" name="yeni-urun" required>
                    <option value="evet">Evet</option>
                    <option value="hayir">Hayır</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="taksit">Taksit <span style="color: red;"> *</span></label>
                  <select id="taksit" name="taksit" required>
                    <option value="evet">Evet</option>
                    <option value="hayir">Hayır</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="garanti-suresi">Garanti Süresi</label>
                  <input type="text" id="garanti-suresi" name="garanti-suresi">
                </div>


              </div>
              <div class="tab-pane fade" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab">
                <div class="form-group">
                  <label for="urun-ana-resmi">Ürün Ana Resmi</label>
                  <div class="image-container">
                    <img src="assets/img/kamera.png" alt="Ürün Ana Resmi" class="img-fluid kamera"
                      id="urunAnaResmiPreview">
                    <input type="file" name="urun_ana_resmi" id="urunAnaResmiInput" style="display: none;"
                      accept="image/*">
                    <button type="button" onclick="clearImage();">Temizle</button>
                    <button type="button" onclick="document.getElementById('urunAnaResmiInput').click();">Resim
                      Ekle</button>
                  </div>
                  <small>Ürüne ana resim eklemek için tıklayın. Ürün resim eklerken kare resim girilmelisiniz,
                    önerilen boyut 800px genişlik, 800px yükseklik. Ürün resim eklerken maksimum resim boyutu 1MB ve
                    genişlik 768px, yükseklik 1024px olmalıdır.</small>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-sale" role="tabpanel" aria-labelledby="nav-sale-tab">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Müşteri Grubu</th>
                      <th scope="col">Öncelik</th>
                      <th scope="col">Yüzde İndirim Oranı Veya İndirimli Fiyatı</th>
                      <th scope="col">Başlangıç Tarihi</th>
                      <th scope="col">Bitiş Tarihi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="form-group">
                          <select id="musteri" name="musteri" class="placeholder-gray">
                            <option value="Musteri">Müşteri</option>
                            <option value="Yatirimci">Yatırımcı</option>
                          </select>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="text" id="oncelik" name="oncelik">
                        </div>
                      </td>
                      <td>
                        <div class="form-group flex-column">
                          <div class="d-flex">
                            <input type="text" id="tl" name="tl" value="0.00" class="placeholder-gray"> <span
                              class="p-1">TL</span>
                          </div>

                          <select id="fiyat" name="fiyat" class="placeholder-gray">
                            <option value="Fiyat">Fiyat</option>
                          </select>
                        </div>

                        <div class="form-group">

                          <div class="d-flex">
                            <input type="text" id="dolar" name="dolar" value="0.00" class="placeholder-gray"> <span
                              class="p-1">$</span>
                          </div>

                          <select id="fiyat2" name="fiyat2" class="placeholder-gray">
                            <option value="Fiyat">Fiyat</option>
                          </select>
                        </div>

                        <div class="form-group">

                          <div class="d-flex">
                            <input type="text" id="euro" name="euro" value="0.00" class="placeholder-gray"> <span
                              class="p-1">€</span>
                          </div>

                          <select id="fiyat3" name="fiyat3" class="placeholder-gray">
                            <option value="Fiyat">Fiyat</option>
                          </select>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="date" id="baslangic_tarihi" name="baslangic-tarihi">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="date" id="bitis_tarihi" name="bitis-tarihi">
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>

            <div class="button-group">
              <button type="submit" id="kaydetBtn">Kaydet</button>
              <button type="submit" id="guncelleBtn"  style="display: none;">Güncelle</button>
              <button type="reset">İptal</button>
            </div>
          </form>
                  

        </div>
      </div>

    </section><!-- /Hero Section -->
  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container copyright text-center mt-4">
      <div class="credits">
        Designed by <a href="#">Nazlı Topkara</a>
      </div>
    </div>

  </footer>


  <script>

  </script>



  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>