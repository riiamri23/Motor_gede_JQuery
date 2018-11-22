<?php
include_once 'koneksi.php';
    $id_penjualan = $_POST['id_penjualan'];
    $konfirmasi = $_POST['konfirmasi'];

    $query = "UPDATE `db_moge`.`penjualan` SET `status` = '$konfirmasi' WHERE (`id_penjualan` = '$id_penjualan');";
    if(mysqli_query($koneksi, $query)){
            
        echo 'berhasil';
        mysqli_close($koneksi);
    }else{
        echo 'gagal';
    }
?>