<?php 

//// Penyambungan koneksi ke database SQL Server
// source: https://www.php.net/manual/en/function.sqlsrv-connect.php

// Nama server di sql server kalian
$namaServer = "KHIP01\SQLEXPRESS"; 
// Memuat informasi mengenai koneksi nya, seperti database, username, dan password, 
// tapi disini saya kasih contoh untuk memuat database nya saja
$infoKoneksi = array("Database"=>"db_acara"); 

// menyatukan semua kredensial, mulai dari nama server dan info koneksi nya untuk dihubungkan ke sql server
$koneksi = sqlsrv_connect($namaServer, $infoKoneksi);

if ($koneksi){
    echo "Koneksi Sukses!";
} else {
    echo "Koneksi Gagal!<br>";
    die(print_r(sqlsrv_errors(), true));
}


?>