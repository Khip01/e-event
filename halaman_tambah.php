<?php 
require("./fungsi.php");

// Mengecek apakah tombol_submit sudah ada isinya atau belum
if(isset($_POST["tombol_submit"])) {
    $tambahDataPeserta = tambahDataPeserta($_POST);

    // Setelah menghapus, maka akan diarahkan kembali ke halaman index.php
    if($tambahDataPeserta) {
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            window.location.href = './index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan');
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
    <title>Tambah Data</title>
</head>

<body>
    <br><br>
    [<a href="./index.php">Kembali</a>] membatalkan tambah data
    <br><br>

    <!-- FORM untuk menambahkan data baru -->
     <form method="POST" action="">
        <label for="labelNama">Nama: </label>
        <input type="text" name="field_nama" id="labelNama" required>
        <br>
        <label for="labelNama">Umur: </label>
        <input type="number" name="field_umur" id="labelUmur" required>
        <br>
        <button type="submit" name="tombol_submit">Kirim</button>
     </form>
</body>

</html>