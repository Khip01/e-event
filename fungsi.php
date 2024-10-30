<?php 
// Import file koneksinya
require('./koneksi.php');

//// Berisi mengenai cara-cara kita berinteraksi dengan database

// GET - Mengambil semua data yang ada di database
function tampilSemuaDataPeserta(){
    // Mengambil variabel koneksi di file konseksi.php dan menjadikannya global 
    global $koneksi;

    // Membuat kueri SQL untuk mengambil semua data yang ada di database
    $kueriSQL = "SELECT * FROM tbl_peserta";
    $hasilKuery = sqlsrv_query($koneksi, $kueriSQL);

    // Menyimpan hasil kueri ke dalam variabel array 
    $dataArrayPeserta = []; // Inisialisasi array kosong

    // loping tiap baris data yang ada di database untuk disimpan ke dataArrayPeserta
    while ($dataPeserta = sqlsrv_fetch_array($hasilKuery)){
        // Menambahkan data ke dalam array
        $dataArrayPeserta[] = $dataPeserta;
    }

    // Mengembalikan nilai array yang berisi data-data peserta
    return $dataArrayPeserta;
} 

// GET - Mengambil data peserta berdasarkan ID
function tampilkanDataPesertaBerdasarkanId($idPeserta){
    global $koneksi;

    $kueriSQL = "SELECT * FROM tbl_peserta WHERE id_peserta = ?";
    $parameterWhere = array($idPeserta);
    $hasilKuery = sqlsrv_query($koneksi, $kueriSQL, $parameterWhere);

    $dataArrayPeserta = [];

    while ($dataPeserta = sqlsrv_fetch_array($hasilKuery)){
        // Menambahkan data ke dalam array
        $dataArrayPeserta[] = $dataPeserta;
    }

    // Mengembalikan nilai array yang berisi data peserta berdasarkan ID
    return $dataArrayPeserta[0];
}

// CREATE - Membuat data peserta baru
function tambahDataPeserta($postDataPeserta){
    global $koneksi;

    // Validasi htmlspecialchars
    $nama = htmlspecialchars($postDataPeserta["field_nama"]);
    $umur = htmlspecialchars($postDataPeserta["field_umur"]);

    $kueriSQL = "INSERT INTO tbl_peserta (nama, umur) VALUES (?, ?)";
    $parameterInsert = array($nama, $umur);
    $hasilKueri = sqlsrv_query($koneksi, $kueriSQL, $parameterInsert);

    return $hasilKueri;
}

// UPDATE - Mengubah data peserta
function ubahDataPeserta($idPeserta, $postDataPeserta){
    global $koneksi;

    // Validasi htmlspecialchars
    $nama = htmlspecialchars($postDataPeserta["field_nama"]);
    $umur = htmlspecialchars($postDataPeserta["field_umur"]);

    $kueriSQL = "UPDATE tbl_peserta SET nama = ?, umur = ? WHERE id_peserta = ?";
    $parameterUpdate = array($nama, $umur, $idPeserta);
    $hasilKueri = sqlsrv_query($koneksi, $kueriSQL, $parameterUpdate);

    return $hasilKueri;
}

// DELETE - Menghapus data peserta berdasarkan ID
function menghapusDataPesertaBerdasarkanId($idPeserta){
    global $koneksi;

    $kueriSQL = "DELETE FROM tbl_peserta WHERE id_peserta = ?";
    $parameterWhere = array($idPeserta);
    $hasilKueri = sqlsrv_query($koneksi, $kueriSQL, $parameterWhere);

    return $hasilKueri;
}
?>