<?php
include_once 'koneksi.php';
        
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $phone = $_POST['phone'];
    $jk = $_POST['jk'];
    $tgl_lahir = date("Y-m-d",$_POST['tgl_lahir']);

    $query = "INSERT INTO `db_moge`.`user` (`username`, `password`, `email`, `nama`, `alamat`, `phone`, `jenis_kelamin`, `tgl_lahir`) VALUES ('$username', '$password', '$email', '$nama', '$alamat', '$phone', '$jk', '$tgl_lahir');
    ";
    if(mysqli_query($koneksi, $query)){
            
        echo 'berhasil';
        mysqli_close($koneksi);
    }else{
        echo 'gagal';
    }
?>