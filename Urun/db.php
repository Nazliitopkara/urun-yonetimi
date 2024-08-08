<?php
// Veritabanı bilgileri
$host = 'localhost';
$dbname = 'daynex';
$username = 'root';
$password = '';

// Veritabanına bağlantı
$baglan = mysqli_connect($host, $username, $password, $dbname);

if (!$baglan) {
    die("Veritabanı Bağlantı İşlemi Başarısız: " . mysqli_connect_error());
}