<?php 
// Mengecek apakah id_peserta pada parameter url GET sudah ada isinya atau belum
// Jika belum maka langsung dikembalikan ke halaman index.php
if(!isset($_GET["id_peserta"])) {
    header("Location: ./index.php");
}

// Mengecek jika id_peserta pada parameter url GET kosong
if($_GET["id_peserta"] == ""){
    header("Location: ./index.php");
}

require("./fungsi.php");

// Mengambil 1 data peserta berdasarkan id yang diberikan di parameter url GET  
$dataPeserta = tampilkanDataPesertaBerdasarkanId($_GET["id_peserta"]);

// Mengecek apakah tombol_submit sudah di inisialisasi atau belum
if(isset($_POST["tombol_submit"])) {
    $ubahDataPeserta = ubahDataPeserta($_GET["id_peserta"], $_POST);

    // Setelah menghapus, maka akan diarahkan kembali ke halaman index.php
    if($ubahDataPeserta) {
        echo "
        <script>
            alert('Data berhasil diubah');
            window.location.href = './index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah');
            window.location.href = './index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>
<body>
    <br><br>
    [<a href="./index.php">Kembali</a>] membatalkan ubah data
    <br><br>

    <!-- FORM untuk menambahkan data baru -->
     <form method="POST" action="">
        <label for="labelNama">Nama: </label>
        <input type="text" name="field_nama" id="labelNama" value="<?= $dataPeserta['nama'] ?>" required>
        <br>
        <label for="labelNama">Umur: </label>
        <input type="number" name="field_umur" id="labelUmur" value="<?= $dataPeserta['umur'] ?>" required>
        <br>
        <button type="submit" name="tombol_submit">Kirim</button>
     </form>
</body>
</html>