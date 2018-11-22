<?php
include_once 'includes/koneksi.php';

if(ISSET($_POST['submit'])){

    $berkas = $_FILES['berkas'];

    $berkasName = $_FILES['berkas']['name'];
    $berkasTmpName = $_FILES['berkas']['tmp_name'];
    $berkasSize = $_FILES['berkas']['size'];
    $berkasError = $_FILES['berkas']['error'];
    $berkasType = $_FILES['berkas']['type'];

    $berkasExt = explode('.', $berkasName);
    $berkasActualExt = strtolower(end($berkasExt));

    $allowed = array('jpeg','jpg','png');

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    if(in_array($berkasActualExt, $allowed)){
        if($berkasError === 0){
            if($berkasSize < 1000000){
                $berkasNameNew = uniqid('', true) . "." . $berkasActualExt;
                $berkasDestination = 'images/' . $berkasNameNew;
                if(move_uploaded_file($berkasTmpName, $berkasDestination)){    
                    $query = "INSERT INTO `db_moge`.`barang` (`nama_barang`, `harga_barang`, `gambar_barang`, `deskripsi_barang`) VALUES ('$nama', '$harga', '$berkasDestination', '$deskripsi');";
                    if(mysqli_query($koneksi, $query)){
                        
                        echo 'berhasil';
                        header("location: index.php");
                        mysqli_close($koneksi);
                    }else{
                        echo 'gagal';
                    }
                
                }
            }else{
                echo 'Your file is too big!';
            }
        }else{
            echo 'There was an error uploading your file!';
        }
    }else{
        echo 'You cannot upload files of this type';
    }
}
?>