<?php
include_once 'koneksi.php';
        
    $tgl_penjualan = date("Y-m-d");
    $id_user = $_POST['id_user'];
    $id_barang = $_POST['id_barang'];
    $atas_nama = $_POST['atas_nama'];
    $alamat_tujuan = $_POST['alamat_tujuan'];
    $kurir = $_POST['kurir'];
    $bank = $_POST['bank'];
    $total = $_POST['total'];
    $kode = uniqid('', true). $id_user;
    $status = 'belum dibayar';
    

    $query = "INSERT INTO `db_moge`.`penjualan` (`tgl_penjualan`, `id_user`, `id_barang`, `atas_nama`, `alamat_tujuan`, `kurir`, `bank`, `total_bayar`, `kode_pembayaran`, `status`) VALUES ('$tgl_penjualan', '$id_user', '$id_barang', '$atas_nama', '$alamat_tujuan', '$kurir', '$bank', '$total', '$kode', '$status');";
    if(mysqli_query($koneksi, $query)){
            
        echo 'berhasil';
        mysqli_close($koneksi);
    }else{
        echo 'gagal';
    }
?>