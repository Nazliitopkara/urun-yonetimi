

(function () {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function (e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);


  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function (e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);


  //Required

  document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
      const requiredFields = form.querySelectorAll("[required]");
      let allFilled = true;

      requiredFields.forEach(field => {
        if (!field.value.trim()) {
          allFilled = false;
          field.style.borderColor = "red"; // Eksik alanları kırmızıyla işaretle
        } else {
          field.style.borderColor = ""; // Dolu olan alanları normal hale getir
        }
      });

      if (!allFilled) {
        event.preventDefault(); // Formun gönderilmesini engelle
        Swal.fire({
          icon: 'error',
          title: 'Eksik Alanlar',
          text: 'Lütfen zorunlu alanları doldurduğunuzdan emin olun.',
          confirmButtonText: 'Tamam'
        });
      }
    });
  });

  // Resim ekle ve ya Sil
  function clearImage() {
    const fileInput = document.getElementById('urunAnaResmiInput');
    const preview = document.getElementById('urunAnaResmiPreview');

    // Dosya input değerini sıfırla
    fileInput.value = '';

    // Varsayılan resme geri dön
    preview.src = 'assets/img/kamera.png';
  }

  document.getElementById('urunAnaResmiInput').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
      document.getElementById('urunAnaResmiPreview').src = e.target.result;
    }

    if (file) {
      reader.readAsDataURL(file);
    }
  });

  /*
    //Modal
    document.addEventListener('DOMContentLoaded', function () {
      let currentPage = 1;
  
      function loadTableData(page) {
        fetch(`get_products.php?page=${page}`)
          .then(response => response.json())
          .then(data => {
            let tableBody = document.getElementById('urunlerTableBody');
            tableBody.innerHTML = ''; // Önceki verileri temizle
  
            data.data.forEach(urun => {
              let row = document.createElement('tr');
              Object.values(urun).forEach(value => {
                let cell = document.createElement('td');
                cell.textContent = value;
                row.appendChild(cell);
              });
  
              // Düzenleme butonunu ekle
              let editCell = document.createElement('td');
              let editButton = document.createElement('button');
              editButton.className = 'btn btn-warning btn-edit bi bi-pencil-square';
              editButton.textContent = '';
              editButton.setAttribute('data-id', urun.id); // ID'yi butona ekle
              editButton.setAttribute('data-bs-toggle', 'modal');
              editCell.appendChild(editButton);
              row.appendChild(editCell);
  
              tableBody.appendChild(row);
            });
  
            updatePagination(page, data.total_pages);
          })
          .catch(error => console.error('Veri çekme hatası:', error));
      }
  
      // Düzenle butonuna tıklandığında çalışacak fonksiyon
      function editButtonHandler(event) {
        const editButton = event.target;
        const form = document.getElementById('form1');
        form.action = 'update.php';
      }
  
      // Kaydet butonuna tıklandığında çalışacak fonksiyon
      document.getElementById('kaydetBtn').addEventListener('click', function () {
        const form = document.getElementById('form1');
        form.action = 'baglanti.php';
      });
  
      // Tüm düzenleme butonlarına event listener ekle
      const editButtons = document.querySelectorAll('.btn-edit');
      editButtons.forEach(button => {
        button.addEventListener('click', editButtonHandler);
      });
  
      function updatePagination(currentPage, totalPages) {
        let paginationContainer = document.getElementById('pagination');
        paginationContainer.innerHTML = '';
  
        for (let i = 1; i <= totalPages; i++) {
          let pageLink = document.createElement('a');
          pageLink.href = '#';
          pageLink.textContent = i;
          pageLink.className = i === currentPage ? 'active' : '';
          pageLink.addEventListener('click', function (event) {
            event.preventDefault();
            loadTableData(i);
          });
          paginationContainer.appendChild(pageLink);
        }
      }
  
      document.getElementById('urunlerModal').addEventListener('shown.bs.modal', function () {
        loadTableData(currentPage);
      });
  
  
      // Modal açıldığında düzenlenecek veriyi yükle
      document.addEventListener('click', function (event) {
        if (event.target.classList.contains('btn-edit')) {
          const id = event.target.getAttribute('data-id');
          fetch(`get_product.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
              console.log(data); // Bu satırı ekleyin
              document.getElementById('urun-id').value = data.id;
              document.getElementById('turkce-urun-baslik').value = data.urun_baslik;
              document.getElementById('turkce-urun-ek-bilgi-baslik').value = data.urun_ek_bilgi_baslik;
              document.getElementById('turkce-urun-ek-bilgi-aciklama').value = data.urun_ek_bilgi_aciklama;
              document.getElementById('turkce-meta-title').value = data.meta_title;
              document.getElementById('turkce-meta-keywords').value = data.meta_keywords;
              document.getElementById('turkce-meta-description').value = data.meta_description;
              document.getElementById('turkce-seo-adresi').value = data.seo_adresi;
              document.getElementById('turkce-urun-aciklama').value = data.urun_aciklama;
              document.getElementById('turkce-video-embed-kodu').value = data.video_embed_kodu;
              document.getElementById('urun-kodu').value = data.urun_kodu;
              document.getElementById('miktar').value = data.miktar;
              document.getElementById('sepet-indirim').value = data.sepet_indirim;
              document.getElementById('vergi-orani').value = data.vergi_orani;
              document.getElementById('satis-fiyati-tl').value = data.satis_fiyati_tl;
              document.getElementById('satis-fiyati-usd').value = data.satis_fiyati_usd;
              document.getElementById('satis-fiyati-eur').value = data.satis_fiyati_eur;
              document.getElementById('ikinci-satis-fiyati').value = data.ikinci_satis_fiyati;
              document.getElementById('stoktan-dus').value = data.stoktan_dus;
              document.getElementById('durum').value = data.durum;
              document.getElementById('ozellik-bolumu').value = data.ozellik_bolumu;
              document.getElementById('yeni-urun-sure').value = data.yeni_urun_sure;
              document.getElementById('siralama').value = data.siralama;
              document.getElementById('anasayfa-goster').value = data.anasayfa_goster;
              document.getElementById('yeni-urun').value = data.yeni_urun;
              document.getElementById('taksit').value = data.taksit;
              document.getElementById('garanti-suresi').value = data.garanti_suresi;
              document.getElementById('urunAnaResmiPreview').value = data.urunAnaResmiPreview;
              document.getElementById('musteri').value = data.musteri;
              document.getElementById('oncelik').value = data.oncelik;
              document.getElementById('tl').value = data.tl;
              document.getElementById('fiyat').value = data.fiyat;
              document.getElementById('dolar').value = data.dolar;
              document.getElementById('fiyat2').value = data.fiyat2;
              document.getElementById('euro').value = data.euro;
              document.getElementById('fiyat3').value = data.fiyat3;
              document.getElementById('baslangic_tarihi').value = data.baslangic_tarihi;
              document.getElementById('bitis_tarihi').value = data.bitis_tarihi;
  
            })
            .catch(error => console.error('Veri çekme hatası:', error));
        }
      });
    });
    */

  document.addEventListener('DOMContentLoaded', function () {
    let currentPage = 1;

    function loadTableData(page) {
      fetch(`get_products.php?page=${page}`)
        .then(response => response.json())
        .then(data => {
          let tableBody = document.getElementById('urunlerTableBody');
          tableBody.innerHTML = ''; // Önceki verileri temizle

          data.data.forEach(urun => {
            let row = document.createElement('tr');
            Object.values(urun).forEach(value => {
              let cell = document.createElement('td');
              cell.textContent = value;
              row.appendChild(cell);
            });

            // Düzenleme butonunu ekle
            let editCell = document.createElement('td');
            let editButton = document.createElement('button');
            editButton.className = 'btn btn-warning btn-edit bi bi-pencil-square';
            editButton.textContent = '';
            editButton.setAttribute('data-id', urun.id); // ID'yi butona ekle
            editButton.setAttribute('data-bs-toggle', 'modal');
            editButton.setAttribute('data-bs-target', '#urunlerModal'); // Modalı açacak
            editCell.appendChild(editButton);
            row.appendChild(editCell);

            tableBody.appendChild(row);
          });

          updatePagination(page, data.total_pages);
        })
        .catch(error => console.error('Veri çekme hatası:', error));
    }

    // Tüm düzenleme butonlarına event listener ekle
    document.addEventListener('click', function (event) {
      if (event.target.classList.contains('btn-edit')) {
        editButtonHandler(event);
        const id = event.target.getAttribute('data-id');
        fetch(`get_product.php?id=${id}`)
          .then(response => response.json())
          .then(data => {
            console.log(data); // Bu satırı ekleyin
            document.getElementById('urun-id').value = data.id;
            document.getElementById('turkce-urun-baslik').value = data.urun_baslik;
            document.getElementById('turkce-urun-ek-bilgi-baslik').value = data.urun_ek_bilgi_baslik;
            document.getElementById('turkce-urun-ek-bilgi-aciklama').value = data.urun_ek_bilgi_aciklama;
            document.getElementById('turkce-meta-title').value = data.meta_title;
            document.getElementById('turkce-meta-keywords').value = data.meta_keywords;
            document.getElementById('turkce-meta-description').value = data.meta_description;
            document.getElementById('turkce-seo-adresi').value = data.seo_adresi;
            document.getElementById('turkce-urun-aciklama').value = data.urun_aciklama;
            document.getElementById('turkce-video-embed-kodu').value = data.video_embed_kodu;
            document.getElementById('urun-kodu').value = data.urun_kodu;
            document.getElementById('miktar').value = data.miktar;
            document.getElementById('sepet-indirim').value = data.sepet_indirim;
            document.getElementById('vergi-orani').value = data.vergi_orani;
            document.getElementById('satis-fiyati-tl').value = data.satis_fiyati_tl;
            document.getElementById('satis-fiyati-usd').value = data.satis_fiyati_usd;
            document.getElementById('satis-fiyati-eur').value = data.satis_fiyati_eur;
            document.getElementById('ikinci-satis-fiyati').value = data.ikinci_satis_fiyati;
            document.getElementById('stoktan-dus').value = data.stoktan_dus;
            document.getElementById('durum').value = data.durum;
            document.getElementById('ozellik-bolumu').value = data.ozellik_bolumu;
            document.getElementById('yeni-urun-sure').value = data.yeni_urun_sure;
            document.getElementById('siralama').value = data.siralama;
            document.getElementById('anasayfa-goster').value = data.anasayfa_goster;
            document.getElementById('yeni-urun').value = data.yeni_urun;
            document.getElementById('taksit').value = data.taksit;
            document.getElementById('garanti-suresi').value = data.garanti_suresi;
            document.getElementById('urunAnaResmiPreview').value = data.urunAnaResmiPreview;
            document.getElementById('musteri').value = data.musteri;
            document.getElementById('oncelik').value = data.oncelik;
            document.getElementById('tl').value = data.tl;
            document.getElementById('fiyat').value = data.fiyat;
            document.getElementById('dolar').value = data.dolar;
            document.getElementById('fiyat2').value = data.fiyat2;
            document.getElementById('euro').value = data.euro;
            document.getElementById('fiyat3').value = data.fiyat3;
            document.getElementById('baslangic_tarihi').value = data.baslangic_tarihi;
            document.getElementById('bitis_tarihi').value = data.bitis_tarihi;
          })
          .catch(error => console.error('Veri çekme hatası:', error));
      }
    });

    function updatePagination(currentPage, totalPages) {
      let paginationContainer = document.getElementById('pagination');
      paginationContainer.innerHTML = '';

      for (let i = 1; i <= totalPages; i++) {
        let pageLink = document.createElement('a');
        pageLink.href = '#';
        pageLink.textContent = i;
        pageLink.className = i === currentPage ? 'active' : '';
        pageLink.addEventListener('click', function (event) {
          event.preventDefault();
          loadTableData(i);
        });
        paginationContainer.appendChild(pageLink);
      }
    }

    // Kaydet butonuna tıklandığında çalışacak fonksiyon
    document.getElementById('kaydetBtn').addEventListener('click', function () {
      const form = document.getElementById('form1');
      form.action = 'baglanti.php';
    });

    // Düzenle butonuna tıklandığında çalışacak fonksiyon
    function editButtonHandler(event) {
      const editButton = event.target;
      const form = document.getElementById('form1');
      form.action = 'update.php';

      // Kaydet butonunu pasif, Güncelle butonunu aktif yap
      document.getElementById('kaydetBtn').style.display = 'none';
      document.getElementById('guncelleBtn').style.display = 'block';
    }

    document.getElementById('urunlerModal').addEventListener('shown.bs.modal', function () {
      loadTableData(currentPage);
    });

    document.getElementById('urunlerModal').addEventListener('hidden.bs.modal', function () {
      document.getElementById('kaydetBtn').style.display = 'none';
      document.getElementById('guncelleBtn').style.display = 'block';
    });
    

  });

})();