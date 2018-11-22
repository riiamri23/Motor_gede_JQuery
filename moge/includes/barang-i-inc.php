<?php
include_once 'koneksi.php';


    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $query = "INSERT INTO `db_moge`.`barang` (`nama_barang`, `harga_barang`, `deskripsi_barang`) VALUES ('$nama', '$harga', '$deskripsi');
    ";
   if(mysqli_query($koneksi, $query)){
        
        header("location: ../index.php?berhasil");
        mysqli_close($koneksi);
    }else{
        header("location: ../barang-i.php?gagal");
    }
?>