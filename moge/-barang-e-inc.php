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

    $id_barang = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga_barang'];
    $deskripsi = $_POST['deskripsi_barang'];

    if(in_array($berkasActualExt, $allowed)){
        if($berkasError === 0){
            if($berkasSize < 1000000){
                $berkasNameNew = uniqid('', true) . "." . $berkasActualExt;
                $berkasDestination = 'images/' . $berkasNameNew;
                if(move_uploaded_file($berkasTmpName, $berkasDestination)){    
                    $query = "UPDATE `db_moge`.`barang` SET `nama_barang` = '$nama', `harga_barang` = '$harga', `gambar_barang` = '$berkasDestination', `deskripsi_barang` = '$deskripsi' WHERE (`id_barang` = '$id_barang');";
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