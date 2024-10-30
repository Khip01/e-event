<?php
require('./fungsi.php');

$dataSemuaPeserta = tampilSemuaDataPeserta();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Tampil</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <br><br>
    <a href="./halaman_tambah.php">Tambah Data Peserta Baru</a>
    <br>

    <!-- Menampilkan data yang ada di database SQL Server -->
    <h3>Menggunakan Tabel</h3>
    <table>
        <tr>
            <th>Nama</th>
            <th>Umur</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php foreach ($dataSemuaPeserta as $dataPeserta) : ?>
            <tr>
                <td><?= $dataPeserta["nama"] ?></td>
                <td><?= $dataPeserta["umur"] ?></td>
                <td><a href="./halaman_ubah.php?id_peserta=<?= $dataPeserta["id_peserta"] ?>">Ubah Data</a></td>
                <td><a href="#" onclick="return konfirmasiHapus(<?= $dataPeserta['id_peserta'] ?>)">Hapus Data</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <br>
    <br>

    <h3>Menggunakan List</h3>
    <?php foreach ($dataSemuaPeserta as $dataPeserta) : ?>
        <?= $dataPeserta["nama"] ?> berumur <?= $dataPeserta["umur"] ?>
        <br>
        <a href="./halaman_ubah.php?id_peserta=<?= $dataPeserta["id_peserta"] ?>">Ubah Data</a> |
        <a href="#" onclick="return konfirmasiHapus(<?= $dataPeserta['id_peserta'] ?>)">Hapus Data</a>
        <br><br>
    <?php endforeach; ?>


    <!-- SCRIPT Javascript -->
    <script>
        // Konfirmasi terhadap penghapusan data
        function konfirmasiHapus(idPeserta) {
            if(confirm("Apakah anda yakin ingin menghapus data ini?")){
                console.log("Menghapus id " + idPeserta);
                window.location.href = "halaman_hapus.php?id_peserta=" + idPeserta;
                return true;
            }
            return false;
        }
    </script>
</body>

</html>