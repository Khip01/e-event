<?php 
    require("./fungsi.php");

    // Validasi apabila tidak ada id_peserta yang dikirimkan
    if(!isset($_GET["id_peserta"])) {
        // Mengarahkan langsung ke halaman index.php
        header("Location: ./index.php");
    }

    $hapusDataPeserta = menghapusDataPesertaBerdasarkanId($_GET["id_peserta"]);
    
    // Setelah menghapus, maka akan diarahkan kembali ke halaman index.php
    if($hapusDataPeserta) {
        echo "
        <script>
            alert('Data berhasil dihapus');
            window.location.href = './index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            window.location.href = './index.php';
        </script>
        ";
    }
    
?>